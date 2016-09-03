@extends('app')
@section('content')
<div class="container">
      
      @include('errors._check')
    <h3>Editar Cliente: {{$cli->name}}</h3>
     {!! Form::model($cli,['route'=>['admin.clients.update', $cli->id]]) !!}
   
    
	 @include('admin.clients._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Salvar Cliente',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection