@extends('app')
@section('content')
<div class="container">
    <h3>Cupoms</h3>
<a href="{{route('admin.cupoms.create')}}" class="btn btn-success">Novo Cupom</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($cupoms as $cup)
            <tr>
                <td>{{$cup->id}}</td>
                <td>{{$cup->code}}</td>
                <td>{{$cup->value}}</td>
                
                <td>
                    
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
{!! $cupoms->render() !!}
</div>

@endsection