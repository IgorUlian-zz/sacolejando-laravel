@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['plan_name'] ?? ''}}">
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
                            Preço
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
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->plan_name}}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td>
                                {{$plan->plan_desc}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-info" title="Perfis"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('plans.details', $plan->url)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
