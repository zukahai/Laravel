<?php $__env->startSection('title_page'); ?>
    Detail role <?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?> - Admin - <?php echo e(config('app.name')); ?>

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
        $menu_parent = 'role';
        $menu_child = 'index';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Role: <?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Detail role <?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.role.index')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Role
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    Role <?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?>

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

    <?php if(!empty($success)): ?>
        <h6 class="alert alert-info"> <?php echo e($success); ?></h6>
    <?php endif; ?>

    <?php if(!$accounts->isEmpty()): ?>
    <div class="container">
        <form action="" method="post">
            <?php echo csrf_field(); ?>
            <div class="row my-5 mx-auto">
                <div class="form-floating col col-6">
                    <select class="form-select col col-8" data-control="select2" id="idTypeTable" name="id_account" data-placeholder="Select an option">
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($account->id); ?>"><?php echo e($account->id); ?> - <?php echo e($account->username); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="idTypeTable">Tài khoản</label>
                </div>
                <div class="form-floating col col-6 mx-auto">
                    <input type="submit" class="btn btn-primary h-100" value="Thêm">
                </div>
            </div>
        </form>
    </div>
    <?php endif; ?>
    <hr class="my-4">
    <h3 class="text-center">Role <?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?></h3>

    <table class="table search-table-outter">
        <thead>
        <?php if(!$roles_account->isEmpty()): ?>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">UserName</th>
                <th class="text-center" scope="col">Roles</th>
                <th class="text-center" scope="col">Created_at</th>
                <th class="text-center" scope="col">AddRole_<?php echo e((!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""); ?>_at</th>
                <th>&nbsp;</th>
            </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $roles_account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row"><?php echo e($item->id); ?></th>
                <td class="align-middle text-center"><?php echo e($item->getAccount->username); ?></td>
                <td class="align-middle text-center">
                    <?php $__currentLoopData = $item->getAccount->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class=" my-1 text-center
                    badge badge-<?php echo e($role->color); ?>"> <?php echo e($role->role_name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td class="align-middle text-center"><?php echo e($item->getAccount->created_at); ?></td>
                <td class="align-middle text-center"><?php echo e($item->created_at); ?></td>
                <td class="align-center justify-content-center">

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
        <?php echo e($roles_account->links()); ?>

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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views\admin\pages\role\detail.blade.php ENDPATH**/ ?>