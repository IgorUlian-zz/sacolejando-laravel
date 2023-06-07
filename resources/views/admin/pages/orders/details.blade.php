@extends('adminlte::page')

@section('title', "Detalhes do pedido {$order->identify}")

@section('content_header')

<h1>Detalhes do Pedido: {{$order->identify}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Status: </strong> {{$order->order_status}}
                </li>
                <li>
                    <strong>Código: </strong> {{$order->identify}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{$order->tenant->tenant_name}}
                </li>
                <li>
                    <strong>Cliente: </strong> {{$order->client->client_name}}
                </li>
                <li>
                    <strong>Email: </strong> {{$order->client->client_email}}
                </li>
                <li>
                    <strong>Contato Cliente: </strong> {{$order->client->contact}}
                </li>
                <li>
                    <strong>Endereço de entrega: </strong> {{$order->adress}}
                </li>
                <li>
                    <strong>Data: </strong> {{$order->created_at}}
                </li>
                <li>
                    <strong>Comentário: </strong> {{$order->comments}}
                </li>
                <li>
                    <strong>Opção de pagamento: </strong> {{$order->payment}}
                </li>
                <li>
                    <strong>TOTAL A PAGAR: </strong> {{$order->total}}
                </li>
                <br>
            </br>

                <tbody>
            </ul>
        </div>
    </div>
@stop