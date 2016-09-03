@extends('app')
@section('content')
<div class="container">
      @include('errors._check')
    <h3>Produtos</h3>
     {!! Form::open(['method'=>'post', 'route'=>'admin.products.create']) !!}
   
    
	  @include('admin.products._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Criar Novo Produto',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection