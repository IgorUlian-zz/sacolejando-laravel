@extends('adminlte::page')

@section('title', "Detalhes do pedido {$foodOrder->order->identify}")

@section('content_header')

<h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Status: </strong> {{$foodOrder->order->order_status}}
                </li>
                <li>
                    <strong>Código: </strong> {{$foodOrder->order->identify}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{$foodOrder->order->tenant->tenant_name}}
                </li>
                <li>
                    <strong>Cliente: </strong> {{$foodOrder->order->client->client_name}}
                </li>
                <li>
                    <strong>Data: </strong> {{$foodOrder->order->created_at}}
                </li>
                <li>
                    <strong>Comida: </strong> {{$foodOrder->food->food_name}}
                </li>
                <li>
                    <strong>Preço Unitário: </strong> {{$foodOrder->price}}
                </li>
                <li>
                    <strong>Quantidade: </strong> {{$foodOrder->quantity}}
                </li>
                <li>
                    <strong>TOTAL A PAGAR: </strong> {{$foodOrder->order->total}}
                </li>

            </ul>
        </div>
    </div>
@stop