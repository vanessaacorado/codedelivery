<?php
namespace CodeDelivery\Http\Controllers;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\OrderRequest;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $order;
    private $user;
    public function __construct(OrderRepository $order, UserRepository $user){
        $this->order = $order;
        $this->user = $user;
   
        
    }
    public function index()
    {   $orders=$this->order->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $valor=$this->order->create($request->all());
        return Redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ord= $this->order->find($id);
         $list_status = [0=>'Pendente', 1=>'A caminho', 2=>'Entregue'];
        $deliveryman=$this->user->findWhere(['rules'=>'deliveryman'])->lists('name','id');
      
        
        return view('admin.orders.edit', compact('ord','list_status', 'deliveryman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        
       
        $ord = $this->order->find($id)->update($request->all());
        return Redirect()->route('admin.orders.index');
    }

  
    
}
