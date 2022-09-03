<?php $__env->startSection('title_page'); ?>
    R333ole - Admin - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('name_user'); ?>
    <?php echo e((auth()->user()->account->username)); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('email_user'); ?>
 haizuka@gmail.com
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
        $menu_parent = 'role';
        $menu_child = 'index';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.account.index')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    Role
<?php $__env->stopSection(); ?>

<?php $__env->startSection('onload'); ?>
    <?php if($message = Session::get('info')): ?>
        onload="abc('<?php echo e($message); ?>' , 'success')"
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        onload="abc('<?php echo e($message); ?>' , 'danger')"
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_card'); ?>
    <div>
    <form method="get" action="">
        <div class="input-group mb-5">
            <input type="text" class="form-control" name="keywords" placeholder="Từ khoá tìm kiếm"
                   value="<?php echo e(request()->keywords); ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    </div>

    <h5 class="text-center">Danh sách vài trò</h5>
    <a href="<?php echo e(route('admin.role.showcreate')); ?>" class="btn btn-primary mb-2">Thêm vai trò</a>
    <?php if(!empty($success)): ?>
        <h6 class="alert alert-info"> <?php echo e($success); ?></h6>
    <?php endif; ?>

    <table class="table search-table-outter">
        <thead>
        <?php if(!$roles->isEmpty()): ?>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Role Name</th>
                <th class="text-center" scope="col">Decription</th>
                <th class="text-center" scope="col">Quantity</th>
                <th>&nbsp;</th>
            </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row"><?php echo e($item->id); ?></th>
                <td class="align-middle text-center">
                    <span class=" my-1 text-center
                    badge badge-<?php echo e($item->color); ?>"> <?php echo e($item->role_name); ?></span>
                </td>
                <td class="align-middle text-center"><?php echo e($item->description); ?></td>
                <td class="align-middle text-center"><?php echo e(count($item->accounts)); ?></td>
                <td class="align-center justify-content-center">

                    <a href="<?php echo e(route('admin.role.detail', ['id' => $item->id])); ?>" class="btn btn-icon btn-info btn-sm btn-icon-md btn-circle mx-1"
                       title="Chi tiết">
                        <i class="fa fa-asterisk"></i>
                    </a>

                    <a href="<?php echo e(route('admin.role.showedit')); ?>/<?php echo e($item->id); ?>" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
                       title="Sửa">
                        <i class="fa fa-edit"></i>
                    </a>

                    <span class="btn btn-icon btn-danger delete-btn btn-sm btn-icon-md btn-circle mx-1"
                          data-toggle="tooltip" data-placement="top" data-id="<?php echo e($item->id); ?>" title="Xóa">
                                    <i class="fa fa-trash"></i>
                                </span>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h1 class="text-light text-center">Không có dữ liệu</h1>
        <?php endif; ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-dark">
        <?php echo e($roles->links()); ?>

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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views/admin/pages/role/index.blade.php ENDPATH**/ ?>