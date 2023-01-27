@extends('adminlte::page')

@section('title', 'Editar o Plano')

@section('content_header')
    <h1>Editar Plano: {{$profiles->profile_name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profiles->url)}}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop
