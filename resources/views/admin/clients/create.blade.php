@extends('app')
@section('content')
<div class="container">
      @include('errors._check')
    <h3>Adicionar Cliente</h3>
     {!! Form::open(['method'=>'post', 'route'=>'admin.clients.create']) !!}
   
    
	  @include('admin.clients._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Criar Novo Cliente',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection