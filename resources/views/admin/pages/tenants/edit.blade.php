@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Editar Empresa')

@section('content_header')
    <h1>Editar a empresa: {{$tenant->tenant_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.update', $tenant->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@stop
