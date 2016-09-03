<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $UserRepository;
    private $OrderRepository;
    private $service;
	private $with = ['client', 'items', 'cupom'];
    public function __construct(
                                UserRepository $UserRepository, 
                                OrderRepository $OrderRepository, OrderService $service){
        $this->UserRepository = $UserRepository;
        $this->OrderRepository = $OrderRepository;
        $this->service= $service;
    }
    public function index(){
        $id=Authorizer::getResourceOwnerId();
        $orders = $this->OrderRepository->with($this->with)
		->skipPresenter(false)
		->scopeQuery(function($query) use ($id){
                return $query->where('user_deliveryman_id', '=', $id);
            })->paginate();
        return $orders;
        
    }
  
    public function show($id){
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->OrderRepository
		->skipPresenter(false)
		->getByIdAndDeliveryman($id, $idDeliveryman);
    }
    
    public function updateStatus(Request $request, $id){
        
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->service->updateStatus($id, $idDeliveryman,
                                              $request->get('status'));
        if($order){
            return $this->OrderRepository->find($order->id);
        }
       
        abort(400,'order não encontrada');
    }
    
}
