@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
<h1>Itens</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}" class="active">Pedidos</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Produto
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Preço
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    {{$order->identify}} 
                                </td>
                                <td>
                                    {{$order->food->food_name}} 
                                </td>
                                <td>
                                    {{$order->quantity}}
                                </td>
                                <td>
                                    {{$order->price}},00
                                </td>
                            </tr>
                        @endforeach                  
                </tbody>
            </table>
        </div>
    </div>
@stop
