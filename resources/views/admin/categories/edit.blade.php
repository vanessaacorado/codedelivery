@extends('app')
@section('content')
<div class="container">
      
      @include('errors._check')
    <h3>Editar Categoria: {{$cat->name}}</h3>
     {!! Form::model($cat,['route'=>['admin.categories.update', $cat->id]]) !!}
   
    
	 @include('admin.categories._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Salvar Categoria',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection