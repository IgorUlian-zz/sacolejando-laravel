@extends('adminlte::page')

@section('title', "Detalhes da Enmpresa {$tenant->tenant_name}")

@section('content_header')
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>plano
                    <strong>Name: </strong> {{$tenant->plan->plan_name}}
                </li>
                <li>
                    <strong>Name: </strong> {{$tenant->tenant_name}}
                </li>
                <li>
                    <strong>CNPJ: </strong> {{$tenant->tenant_cnpj}}
                </li>
                <li>
                    <strong>Email: </strong> {{$tenant->tenant_email}}
                </li>
                <li>
                    <strong>Contato: </strong> {{$tenant->contact}}
                </li>
                <li>
                    <strong>Ativo: </strong> {{$tenant->active == 'Y' ? 'SIM' : 'NÃO'}}
                </li>
            </ul>

            <hr>
            <ul>
                <li>
                    <strong>Data de Ativação: </strong> {{$tenant->subscription}}
                </li>
                <li>
                    <strong>Data de Expiração: </strong> {{$tenant->expires_at}}
                </li>
                <li>
                    <strong>Identificador: </strong> {{$tenant->subscription_id}}
                </li>
                <li>
                    <strong>Data de Expiração: </strong> {{$tenant->expires_at}}
                </li>
                <li>
                    <strong>Inscrição ativa: </strong> {{$tenant->subscription_active == 'Y' ? 'SIM' : 'NÃO'}}
                </li>
                <li>
                    <strong>Inscrição cancelada: </strong> {{$tenant->subscription_suspended == 'Y' ? 'SIM' : 'NÃO'}}
                </li>
            </ul>
            <form action="{{route('tenants.delete', $tenant->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
@stop