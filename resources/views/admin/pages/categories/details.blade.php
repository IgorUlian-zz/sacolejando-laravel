@extends('adminlte::page')

@section('title', "Detalhes da Categoria {$category->category_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$category->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$category->category_name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$category->category_desc}}
                </li>
            </ul>
            <form action="{{route('categories.delete', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop