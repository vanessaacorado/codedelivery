@extends('app')
@section('content')
<div class="container">
      
      @include('errors._check')
    <h3>Editar Categoria: {{$prod->name}}</h3>
     {!! Form::model($prod,['route'=>['admin.products.update', $prod->id]]) !!}
   
    
	 @include('admin.products._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Salvar Produto',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection