@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Cadastrar novo Pedido')

@section('content_header')
    <h1>Cadastrar novo Pedido</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.store')}}" class="form" method="POST">
                @csrf

                @include('admin.pages.orders._partials.form')

            </form>
        </div>
    </div>
@stop