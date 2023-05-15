@extends('adminlte::page')

@section('title', "Detalhes da Permissão {$permission->permission_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Name: </strong> {{$permission->permission_name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->permission_desc}}
                </li>
            </ul>
            <form action="{{route('permissions.delete', $permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop