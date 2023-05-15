@extends('site.layouts.app')

@section('content')
<div class="text-center">
    <h1 class="title-plan">Escolha o plano</h1>
</div>
<div class="row">
    @foreach ($plans as $plan)
        <div class="col-md-4 col-sm-6">
            <div class="pricingTable">
                <div class="pricing-content">
                    <div class="pricingTable-header">
                        <h3 class="title">{{ $plan->plan_name }}</h3>
                    </div> 
                    <div class="inner-content">
                        <div class="price-value">
                            <span class="currency">R$</span>
                            <span class="amount">{{ number_format($plan->plan_price, 2, ',', '.') }}</span>
                            <span class="duration">Por Mês</span>
                        </div>
                    </div>
                    <div>
                        <ul>
                            <li>{{ $plan->plan_desc }}</li>
                        </ul>
                    </div>
                </div>
                <div class="pricingTable-signup">
                    <a href="{{ route('plan.subscription', $plan->url) }}">Assinar</a>
                </div>
            </div>
        </div><!--end-->
    @endforeach
</div>
@endsection