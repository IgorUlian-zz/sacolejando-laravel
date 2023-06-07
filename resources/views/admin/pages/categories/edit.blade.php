@extends('adminlte::page')@include('admin.includes.alerts')


@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar a Categoria: {{$category->category_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@stop
