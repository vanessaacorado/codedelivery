@extends('app')
@section('content')
<div class="container">
    <h3>Categorias</h3>
    <a href="{{route('admin.products.create')}}" class="btn btn-success">Nova Produto</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($products as $prod)
            <tr>
                <td>{{$prod->id}}</td>
                <td>{{$prod->name}}</td>
                <td>{{$prod->category->name}}</td>
                <td>{{$prod->price}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('admin.products.edit',['id'=>$prod->id])}}">
                    Editar
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.products.delete',['id'=>$prod->id])}}">
                    Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
{!! $products->render() !!}
</div>

@endsection