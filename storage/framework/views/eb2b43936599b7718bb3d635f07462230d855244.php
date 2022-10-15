<?php $__env->startSection('title_page'); ?>
    Reset hạng - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('name_user'); ?>
    <?php echo e((auth()->user()->account->username)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('email_user'); ?>
    Tài khoản: <?php echo e(number_format(auth()->user()->money, 0, '', ',')); ?> VND
<?php $__env->stopSection(); ?>

<?php $__env->startSection('role_user'); ?>
    <?php $__currentLoopData = auth()->user()->account->roles->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge badge-light-<?php echo e($role->color); ?> fw-bold fs-8 py-1 mx-auto"><?php echo e($role->role_name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css_custom'); ?>
    <link href="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_custom'); ?>
    <script src="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php
        $menu_parent = 'info';
        $menu_child = 'reset';
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_component'); ?>
    Reset rank
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_layout'); ?>
    Reset rank
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions_layout'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_card'); ?>
    Bảng reset rank
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
    <div class="table-responsive">
        <table class="table search-table-outter">
            <thead>
            <?php if(!$reset_ranks->isEmpty()): ?>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Hạng hiện tại</th>
                    <th class="text-center" scope="col">Hạng reset</th>
                </tr>
            <?php endif; ?>
            </thead>
            <tbody>
            <?php
                $index = 1;
            ?>
            <?php $__empty_1 = true; $__currentLoopData = $reset_ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="align-middle">
                    <th class="align-middle text-center" scope="row"><?php echo e($index++); ?></th>
                    <td class="align-middle text-center"><?php echo e($item->rank); ?></td>
                    <td class="align-middle text-center"><?php echo e($item->newrank); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h1 class="text-light text-center">Không có dữ liệu</h1>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
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


<?php echo $__env->make('user.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views\user\pages\reset_rank.blade.php ENDPATH**/ ?>