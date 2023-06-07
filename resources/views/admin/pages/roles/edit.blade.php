@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Editar o Cargo')

@section('content_header')
    <h1>Editar Cargo: {{$role->role_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->url)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@stop
