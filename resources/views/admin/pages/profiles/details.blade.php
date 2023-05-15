@extends('adminlte::page')

@section('title', "Detalhes do Perfil {$profile->profile_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> {{$profile->url}}
                </li>
                <li>
                    <strong>Name: </strong> {{$profile->profile_name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->profile_desc}}
                </li>
            </ul>
            <form action="{{route('profiles.delete', $profile->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop