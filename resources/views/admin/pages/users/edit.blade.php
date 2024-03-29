@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Editar o Usuário')

@section('content_header')
    <h1>Editar Usuário: {{$user->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@stop
