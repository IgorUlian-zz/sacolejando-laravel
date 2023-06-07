@extends('adminlte::page')
@include('admin.includes.alerts')

@section('title', 'Editar o Perfil')

@section('content_header')
    <h1>Editar Perfil: {{$profile->profile_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->url)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop
