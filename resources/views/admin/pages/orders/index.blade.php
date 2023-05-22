@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Pedidos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}" class="active">Pedidos</a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
                @csrf
                <form action=" {{route('orders.search')}}" method="POST" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['identify'] ?? ''}}">
                    <button type="submit" class="btn btn-dark">Filtrar</button>
                </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Código
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Data
                        </th>
                        <th width="300">
                            Ações
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
                                {{$order->order_status}}
                            </td>
                            <td>
                                {{$order->created_at}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('orders.edit', $order->id)}}"class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('orders.details', $order->id)}}" class="btn btn-info">DETALHES</a>
                                <a href="{{ route('orders.foodDetails', $order->identify)}}" class="btn btn-success">ITENS</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop
