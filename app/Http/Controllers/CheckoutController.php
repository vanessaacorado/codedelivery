<?php

namespace CodeDelivery\Http\Controllers;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\CategoryRequest;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\OrderService;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ProductsRepository;
    private $UserRepository;
    private $OrderRepository;
    private $service;
    public function __construct(ProductRepository $ProductRepository,
                                UserRepository $UserRepository, 
                                OrderRepository $OrderRepository, OrderService $service){
        $this->ProductRepository = $ProductRepository;
        $this->UserRepository = $UserRepository;
        $this->OrderRepository = $OrderRepository;
        $this->service= $service;
    }
    public function index(){
        $clientId = $this->UserRepository->find(Auth::user()->id)->client->id;
        $orders = $this->OrderRepository->scopeQuery(function($query) use ($clientId){
                return $query->where('client_id', '=', $clientId);
            })->paginate();
        return view('customer.order.index', compact('orders'));
        
    }
    public function create(){

        $products = $this->ProductRepository->got();
        
        return view('customer.order.create', compact('products'));

    }
    public function store(Requests\CheckoutRequest $request){
        
        $data = $request->all();
        $clientId = $this->UserRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);
        return redirect()->route('customer.order');
    }
    
}
