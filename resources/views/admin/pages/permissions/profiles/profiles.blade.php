@extends('adminlte::page')

@section('title', "Perfis com a Permissão: {$permission->permission_name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Permissões</a></li>

</ol>

<h1>Perfis da Permissão: <strong>{{$permission->permission_name}}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th width="50">
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
                            <td style="width: 10px;">
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>

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
