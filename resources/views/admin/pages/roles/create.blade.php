@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Cadastrar novo Cargo')

@section('content_header')
    <h1>Cadastrar novo Cargo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store')}}" class="form" method="POST">
                @csrf

                @include('admin.pages.roles._partials.form')

            </form>
        </div>
    </div>
@stop
