@extends('adminlte::page')

@section('title', "Detalhes do Usuário {$user->name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$user->name}}
                </li>
                <li>
                    <strong>Email: </strong> {{$user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{$user->tenants->tenant_name}}
                </li>
                <li>
                    <strong>Contato: </strong> {{$user->contact}}
                </li>
            </ul>
            <form action="{{route('users.delete', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop