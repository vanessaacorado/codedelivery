<?php

namespace CodeDelivery\Http\Controllers;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\CupomRequest;

use CodeDelivery\Http\Controllers\Controller;

class CupomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $cupom;
    public function __construct(CupomRepository $cupom){
        $this->cupom = $cupom;
        
    }
    public function index()
    {   $cupoms=$this->cupom->paginate(15);
      
        return view('admin.cupoms.index', compact('cupoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cupoms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CupomRequest $request)
    {
     
        $valor=$this->cupom->create($request->all());
        return Redirect()->route('admin.cupoms.index');
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
        $cup= $this->cupom->find($id);
        return view('admin.cupoms.edit', compact('cup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CupomRequest $request, $id)
    {
        $data= $request->all();
        
        $cli = $this->cupom->save($request->all(), $id);
        return Redirect()->route('admin.cupoms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = $this->cupom->find($id)->delete();
        return Redirect()->route('admin.cupoms.index');
    }
}
