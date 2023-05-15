@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <h1>Cargos  <a href="{{route('roles.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Perfis</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('roles.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['role_name'] ?? ''}}">
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
                        <th width="250">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{$role->role_name}}
                            </td>
                            <td>
                                {{$role->role_desc}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('roles.edit', $role->url)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-info" title="Permissões"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('roles.details', $role->url)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $roles->appends($filters)->links() !!}

            @else
            {!! $roles->links() !!}

            @endif

        </div>
    </div>
@stop
