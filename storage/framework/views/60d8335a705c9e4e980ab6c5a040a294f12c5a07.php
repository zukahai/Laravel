<?php $__env->startSection('title_page'); ?>
    PTHH - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('name_user'); ?>
    <?php if(auth()->user() != null): ?>
        <?php echo e((auth()->user()->account->username)); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('email_user'); ?>
    <?php if(auth()->user() != null): ?>
        Tài khoản: <?php echo e(number_format(auth()->user()->money, 0, '', ',')); ?> VND
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('role_user'); ?>
    <?php if(auth()->user() != null): ?>
        <?php $__currentLoopData = auth()->user()->account->roles->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge badge-light-<?php echo e($role->color); ?> fw-bold fs-8 py-1 mx-auto"><?php echo e($role->role_name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css_custom'); ?>
    <link href="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_custom'); ?>
    <script src="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php
        $menu_parent = '';
        $menu_child = '';
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_component'); ?>
    PTHH
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_layout'); ?>
    PTHH
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions_layout'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_card'); ?>
    Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('onload'); ?>
    <?php if($message = Session::get('info')): ?>
        onload="abc('<?php echo e($message); ?>' , 'success')"
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        onload="abc('<?php echo e($message); ?>' , 'danger')"
    <?php endif; ?>
    <?php if($message = Session::get('warning')): ?>
        onload="abc('<?php echo e($message); ?>' , 'warning')"
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_card'); ?>
    Hello PTHH
    <form action="" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group my-2">
            <label for="money">Phường trình</label>
            <input type="text" class="form-control" id="pthh" name="pthh" placeholder="Phương trình" value="H2 + O2 = H2O">
            <?php $__errorArgs = ['money'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-bold text-italic text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="justify-content-center d-flex my-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_card'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_layout'); ?>
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title"><?php echo $__env->yieldContent('title_card'); ?></h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                <?php echo $__env->yieldContent('content_card'); ?>
            </div>
            <div class="card-footer">
                <?php echo $__env->yieldContent('footer_card'); ?>
            </div>
        </div>
    </div>
    <!--end::Card-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views\user\pages\pthh\index.blade.php ENDPATH**/ ?>