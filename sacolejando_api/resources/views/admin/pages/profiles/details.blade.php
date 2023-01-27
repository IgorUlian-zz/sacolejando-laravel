@extends('adminlte::page')

@section('title', "Detalhes do Perfil {$profiles->profile_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$profiles->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$profiles->profile_name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profiles->profile_desc}}
                </li>
            </ul>
            <form action="{{route('profiles.delete', $profiles->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop