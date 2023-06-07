

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-users"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number"><?php echo e($totalUsers); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-layer-group"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                <span class="info-box-number"><?php echo e($totalCategories); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-hamburger"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number"><?php echo e($totalFoods); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-building"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number"><?php echo e($totalTenants); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-list-alt"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Planos</span>
                <span class="info-box-number"><?php echo e($totalPlans); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-address-card"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Cargos</span>
                <span class="info-box-number"><?php echo e($totalRoles); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-address-book"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Perfis</span>
                <span class="info-box-number"><?php echo e($totalProfiles); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-lock"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Permissões</span>
                <span class="info-box-number"><?php echo e($totalPermissions); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/home/index.blade.php ENDPATH**/ ?>