@extends('app')
@section('content')
<div class="container">
      @include('errors._check')
    <h3>Adicionar Cupom</h3>
     {!! Form::open(['method'=>'post', 'route'=>'admin.cupoms.create']) !!}
   
    
	  @include('admin.cupoms._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Criar Novo Cupom',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection