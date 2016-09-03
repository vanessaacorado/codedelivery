@extends('app')
@section ('content')

    <div class="container">
        <h2>Pedido #{{$ord->id}} - R$ {{$ord->total}}</h2>
        <h3>Cliente: {{$ord->client->users->name}}</h3>
        <h4>Data do pedido: {{$ord->created_at}}</h4>
        <p>
            <b>Endereço de Entrega: </b><br/>
            {{$ord->client->address}} - {{$ord->client->city}}
            - {{$ord->client->state}}
        </p>
        
     {!! Form::model($ord,['route'=>['admin.orders.update', $ord->id]]) !!}
   <div id="form-group">
        {!! Form::label('Status','Status: ') !!}
        {!! Form::select('status',$list_status, null, ['class'=>'form-control']) !!}
        
    </div>
        <br>
    <div id="form-group">
            {!! Form::label('Entregador','Entregador: ') !!}
            {!! Form::select('user_deliveryman_id',$deliveryman, null, ['class'=>'form-control']) !!}

    </div>
        <br>

    <div id="form-group">
        {!! Form::submit('Salvar',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
    </div>

@endsection