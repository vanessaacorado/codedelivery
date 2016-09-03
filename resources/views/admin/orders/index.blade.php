@extends('app')
@section('content')
<div class="container">
    <h3>Pedidos</h3>

    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Itens</th>
                <th>Data</th>
                <th>Entregador</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($orders as $ord)
            <tr>
                <td>{{$ord->id}}</td>
                <td>{{$ord->total}}</td>
                <td>
                    <ul>
                        @foreach($ord->items as $item)
                            <li>{{$item->product->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$ord->created_at}}</td>
                <td>
                    @if($ord->deliveryman)
                        {{$ord->deliveryman->name}}
                    @else
                        Não há entregador!
                    @endif
                </td>
                <td>{{$ord->status}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('admin.orders.edit',['id'=>$ord->id])}}">
                    Editar
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
{!! $orders->render() !!}
</div>

@endsection