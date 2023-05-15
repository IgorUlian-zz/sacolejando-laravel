@extends('adminlte::page')

@section('title', "Detalhes do Cargo {$role->role_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$role->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$role->role_name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$role->role_desc}}
                </li>
            </ul>
            <form action="{{route('roles.delete', $role->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop