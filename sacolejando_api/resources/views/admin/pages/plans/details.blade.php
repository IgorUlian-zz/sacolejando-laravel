@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plans->plan_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$plans->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$plans->plan_name}}
                </li>
                <li>
                    <strong>Preço: </strong> {{$plans->plan_price}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plans->plan_desc}}
                </li>
            </ul>
            <form action="{{route('plans.delete', $plans->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop