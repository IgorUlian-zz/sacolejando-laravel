@extends('adminlte::page')

@section('title', 'Editar Alimento')

@section('content_header')
    <h1>Editar o alimento: {{$food->food_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('foods.update', $food->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.foods._partials.form')
            </form>
        </div>
    </div>
@stop
