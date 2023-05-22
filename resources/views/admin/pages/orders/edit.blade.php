@extends('adminlte::page')

@section('title', 'Editar um Pedido')

@section('content_header')
    <h1>Editar Pedido: {{$order->identify}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.update', $order->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.orders._partials.form')
            </form>
        </div>
    </div>
@stop
