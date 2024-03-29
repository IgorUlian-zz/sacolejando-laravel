@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Cadastrar nova Empresa')

@section('content_header')
    <h1>Cadastrar nova Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store')}}" class="form" method="POST">
                @csrf

                @include('admin.pages.tenants._partials.form')

            </form>
        </div>
    </div>
@stop
