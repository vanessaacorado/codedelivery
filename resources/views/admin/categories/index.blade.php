@extends('app')
@section('content')
<div class="container">
    <h3>Categorias</h3>
    <a href="{{route('admin.categories.create')}}" class="btn btn-success">Nova Categoria</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('admin.categories.edit',['id'=>$cat->id])}}">
                    Editar
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
{!! $categories->render() !!}
</div>

@endsection