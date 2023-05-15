@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->plan_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$plan->plan_name}}
                </li>
                <li>
                    <strong>Preço: </strong> {{ number_format($plan->plan_price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plan->plan_desc}}
                </li>
            </ul>
            <form action="{{route('plans.delete', $plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop