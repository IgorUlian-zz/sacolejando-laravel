@extends('adminlte::page')

@section('title', "Detalhes do Alimento {$food->food_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$food->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$food->food_name}}
                </li>
                <li>
                    <strong>Preço: </strong> {{$food->food_price}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$food->food_desc}}
                </li>
            </ul>
            <form action="{{route('foods.delete', $food->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop