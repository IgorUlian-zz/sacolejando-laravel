@extends('adminlte::page')

@section('title', 'Alimentos')

@section('content_header')
    <h1>Alimentos <a href="{{route('foods.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('foods.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('foods.index')}}">Alimentos</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('foods.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['food_name'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>

                        <th>
                            Nome
                        </th>
                        <th>
                            Preço
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$food->image}") }}" style="max-width: 90px;">

                            </td>
                            <td>
                                {{$food->food_name}}
                            </td>
                            <td>
                                {{$food->price}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('foods.edit', $food->id)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('foods.categories', $food->id) }}" class="btn btn-info" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('foods.details', $food->id)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $foods->appends($filters)->links() !!}
            @else
                {!! $foods->links() !!}
            @endif
        </div>
    </div>
@stop
