@extends('app')
@section('content')
<div class="container">
    <h3>Clientes</h3>
    <a href="{{route('admin.clients.create')}}" class="btn btn-success">Nova Categoria</a>
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
            @foreach($clients as $cli)
            <tr>
                <td>{{$cli->id}}</td>
                <td>{{$cli->users->name}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('admin.clients.edit',['id'=>$cli->id])}}">
                    Editar
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
{!! $clients->render() !!}
</div>

@endsection