

<?php $__env->startSection('content'); ?>
<div class="text-center">
    <h1 class="title-plan">Escolha o plano</h1>
</div>
<div class="row">
    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-6">
            <div class="pricingTable">
                <div class="pricing-content">
                    <div class="pricingTable-header">
                        <h3 class="title"><?php echo e($plan->plan_name); ?></h3>
                    </div> 
                    <div class="inner-content">
                        <div class="price-value">
                            <span class="currency">R$</span>
                            <span class="amount"><?php echo e(number_format($plan->plan_price, 2, ',', '.')); ?></span>
                            <span class="duration">Por Mês</span>
                        </div>
                    </div>
                    <div>
                        <ul>
                            <li><?php echo e($plan->plan_desc); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="pricingTable-signup">
                    <a href="<?php echo e(route('plan.subscription', $plan->url)); ?>">Assinar</a>
                </div>
            </div>
        </div><!--end-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/site/pages/home/index.blade.php ENDPATH**/ ?>