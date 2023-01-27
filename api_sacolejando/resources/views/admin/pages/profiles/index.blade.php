@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis  <a href="{{route('profiles.create')}}" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>

</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{route('profiles.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['profile_name'] ?? ''}}">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->profile_name}}
                            </td>
                            <td>
                                {{$profile->profile_desc}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('profiles.edit', $profile->url)}}" class="btn btn-warning">EDITAR</a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-info" title="Permissões"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('profiles.details', $profile->url)}}" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $profiles->appends($filters)->links() !!}

            @else
            {!! $profiles->links() !!}

            @endif

        </div>
    </div>
@stop
