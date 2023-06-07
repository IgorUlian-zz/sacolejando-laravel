@extends('adminlte::page')

@include('admin.includes.alerts')


@section('title', "Categorias do alimento {$food->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('foods.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('foods.index') }}">Alimentos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('foods.categories', $food->id) }}" class="active">Categorias</a></li>
    </ol>

    <h1>Categorias do alimento <strong>{{ $food->title }}</strong></h1>

    <a href="{{ route('foods.categories.available', $food->id) }}" class="btn btn-dark">ADD NOVA CATEGORIA</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('foods.category.detach', [$food->id, $category->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop