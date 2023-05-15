@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">Categorias</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('categories.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['category_name'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->category_name}}
                            </td>
                            <td>
                                {{$category->category_desc}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-warning">EDITAR</a>

                                <a href="{{ route('categories.details', $category->id)}}" class="btn btn-info">VER</a>
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
