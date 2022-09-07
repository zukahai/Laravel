<?php $__env->startSection('title_page'); ?>
    Create Rank - <?php echo e(config('app.name')); ?>

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
        $menu_parent = 'plow';
        $menu_child = 'create';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Create plow
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Create plow
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions_layout'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_card'); ?>
    Create plow
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
    <?php if(!empty($money)): ?>
        <?php $__currentLoopData = $money['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h1><?php echo e($item->id); ?>  - <?php echo e($item->name); ?></h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(empty($money)): ?>
    <form action="" method="get" class="py-5" >
        <div class="row my-4">
            <div class="form-group col-6">
                <label for="rank1">Từ rank
                <select class="form-select col col-8" data-control="select2" id="rank1" name="rank1" data-placeholder="Select an option">
                        <?php $__currentLoopData = $subranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->value); ?>"><?php echo e($item->sub_rank_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="star1">Số sao
                <select class="form-select col col-8" data-control="select2" id="star1" name="star1" data-placeholder="Select an option">
                    <?php for($i = 0; $i <= 100; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>


        <div class="row my-4">
            <div class="form-group col-6">
                <label for="rank2">Đến rank
                <select class="form-select col col-8" data-control="select2" id="rank2" name="rank2" data-placeholder="Select an option">
                    <?php $__currentLoopData = $subranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->value); ?>"><?php echo e($item->sub_rank_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="star2">Số sao
                <select class="form-select col col-8" data-control="select2" id="star2" name="star2" data-placeholder="Select an option">
                    <?php for($i = 0; $i <= 100; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        <div class="row my-4">
            <div class="form-group col-6">
                <input type="submit" class="btn btn-primary"  value="Tính tiền">
            </div>
        </div>
    </form>
    <?php endif; ?>
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


<?php echo $__env->make('user.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views/user/pages/plow/create.blade.php ENDPATH**/ ?>