@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões  <a href="{{route('permissions.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('permissions.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['permission_name'] ?? ''}}">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->permission_name}}
                            </td>
                            <td>
                                {{$permission->permission_desc}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('permissions.profiles', $permission->id)}}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
                                <a href="{{ route('permissions.details', $permission->id)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $permissions->appends($filters)->links() !!}

            @else
            {!! $permissions->links() !!}

            @endif

        </div>
    </div>
@stop
