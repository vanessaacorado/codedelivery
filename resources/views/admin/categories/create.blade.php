@extends('app')
@section('content')
<div class="container">
      @include('errors._check')
    <h3>Categorias</h3>
     {!! Form::open(['method'=>'post', 'route'=>'admin.categories.create']) !!}
   
    
	  @include('admin.categories._form')
    <br>
    <div id="form-group">
        {!! Form::submit('Criar Nova Categoria',['class'=>'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
</div>

@endsection