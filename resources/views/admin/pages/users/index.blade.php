@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="{{route('users.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Usuários</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('users.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['name'] ?? ''}}">
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
                            Email
                        </th>
                        <th>
                            Contato
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->contact}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-info" title="Cargos"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('users.details', $user->id)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $users->appends($filters)->links() !!}

            @else
            {!! $users->links() !!}

            @endif

        </div>
    </div>
@stop
