@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Empresas <a href="{{route('tenants.create')}}" class="btn btn-dark"> ADD </a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('tenants.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('tenants.index')}}">Empresas</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('tenants.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['tenant_name'] ?? ''}}">
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
                            CNPJ
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                {{$tenant->tenant_name}}
                            </td>
                            <td>
                                {{$tenant->tenant_cnpj}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('tenants.edit', $tenant->id)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('tenants.details', $tenant->id)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
@stop
