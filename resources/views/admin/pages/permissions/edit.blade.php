@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Editar uma Permissão')

@section('content_header')
    <h1>Editar Permissão: {{$permission->permission_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop
