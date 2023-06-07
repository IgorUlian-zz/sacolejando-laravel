@extends('adminlte::page')

@include('admin.includes.alerts')


@section('title', 'Cadastrar novo Alimento')

@section('content_header')
    <h1>Cadastrar novo Alimento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('foods.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.pages.foods._partials.form')

            </form>
        </div>
    </div>
@stop
