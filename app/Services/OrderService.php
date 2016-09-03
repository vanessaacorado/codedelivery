<?php
namespace CodeDelivery\Services;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Models\Order;
class OrderService{
	private $order;
	private $cupom;
	private $product;
   public function __construct(OrderRepository $order,
							   CupomRepository $cupom,
							   ProductRepository $product){
	
	$this->cupom = $cupom;
	$this->order = $order;
	$this->product=$product;
   }
   
   public function create(array $data){
	
	
				$data['status']=0;
			if (isset($data['cupom_id'])){
				unset($data['cupom_id']);
			}
			if(isset($data['cupom_code'])){
				
				$cupons = $this->cupom->findByField('code',$data['cupom_code'])->first();
				$data['cupom_id']= $cupons->id;
				$cupons->used=1;
				$cupons->save();
				unset($data['cupom_code']);
				
			}
			
			$items = $data['items'];
			unset($data['items']);
			$orders = $this->order->create($data);
			$total = 0;
			foreach($items as $item){
				$item['price'] = $this->product->find($item['product_id'])->price;
				$orders->items()->create($item);
				$total+=$item['price']* $item['qtd'];
			}
			$orders->total=$total;
			if(isset($cupons)){
				$orders->total = $total - $cupons->value;
			}
			$orders->save();
			return $orders;
		  
	
	 }
  public function updateStatus($id, $idDeliveryMan,
                                 $status){
        $order = $this->order->getByIdAndDeliveryman($id, $idDeliveryMan);
		
        if($order instanceof Order){
            
            $order->status = $status;
            $order->save();
            return $order;
			
				
        }
        return false;
    }
}
