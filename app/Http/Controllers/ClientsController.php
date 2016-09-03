<?php

namespace CodeDelivery\Http\Controllers;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $client, $service;
    public function __construct(ClientRepository $client, ClientService $service){
        $this->client = $client;
        $this->service = $service;
        
    }
    public function index()
    {   $clients=$this->client->paginate(15);
      
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $valor=$this->service->create($request->all());
        return Redirect()->route('admin.clients.index');
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
        $cli= $this->client->find($id);
        return view('admin.clients.edit', compact('cli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data= $request->all();
        
        $cli = $this->service->save($request->all(), $id);
        return Redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = $this->client->find($id)->delete();
        return Redirect()->route('admin.clients.index');
    }
}
