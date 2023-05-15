@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->profile_name}")
@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Planos</a></li>

</ol>

<h1>Permissões do perfil <strong>{{$profile->profile_name}}</strong></h1>

<a href="{{ route('profiles.plans.available', $profile->id) }}" class="btn btn-dark">ADD NOVO PLANO</a>



@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th width="50">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->plan_name}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                                
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $plans->appends($filters)->links() !!}

            @else
            {!! $plans->links() !!}

            @endif

        </div>
    </div>
@stop
