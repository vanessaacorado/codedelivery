<?php

namespace CodeDelivery\Http\Controllers;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\ProductRequest;
use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;
    private $category;
    public function __construct(CategoryRepository $category,ProductRepository $product){
        $this->product = $product;
        $this->category = $category;
        
    }
    public function index()
    {   $products=$this->product->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->lists('name','id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $valor=$this->product->create($request->all());
        return Redirect()->route('admin.products.index');
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
    public function edit( $id)
    {
        $prod= $this->product->find($id);
        $categories = $this->category->lists('name','id');
        return view('admin.products.edit', compact('prod', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $prod = $this->product->find($id)->update($request->all());
        return Redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = $this->product->find($id)->delete();
        return Redirect()->route('admin.products.index');
    }
}
