<?php $__env->startSection('title_page'); ?>
    Blog - Admin - <?php echo e(config('app.name')); ?>

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
    <style>
        img{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_custom'); ?>
    <script src="<?php echo e(asset('/admin/assets/plugins/global/plugins.bundle.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <?php
        $menu_parent = 'blog';
        $menu_child = 'index';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    Blog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('actions_layout'); ?>
    <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Blog
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_card'); ?>
    List Blog
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

    <h5 class="text-center">Danh sách Blog</h5>
    <a href="<?php echo e(route('admin.blog.create')); ?>" class="btn btn-primary mb-2">Thêm blog</a>
    <?php if(!empty($success)): ?>
        <h6 class="alert alert-info"> <?php echo e($success); ?></h6>
    <?php endif; ?>

    <table class="table search-table-outter">
        <thead>
        <?php if(!$blogs->isEmpty()): ?>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Tiêu đề</th>
                <th class="text-center" scope="col">Hình ảnh</th>
                <th class="text-center" scope="col">Tác giả</th>
                <th>&nbsp;</th>
            </tr>
        <?php endif; ?>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row"><?php echo e($item->id); ?></th>
                <td class="align-middle text-center"><?php echo e($item->title); ?></td>
                <td class="align-middle text-center">
                    <img src="<?php echo e(url($item->url_image)); ?>" alt="..." class="rounded mx-auto d-block">
                </td>
                <td class="align-middle text-center"><?php echo e($item->account->username); ?></td>
                <td class="align-center justify-content-center">
                    <a href="<?php echo e(route('admin.blog.detail', ['id' => $item->id])); ?>" class="btn btn-icon btn-info btn-sm btn-icon-md btn-circle mx-1"
                       title="Xem">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo e(route('admin.account.update')); ?>/<?php echo e($item->id); ?>" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
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
        <?php echo e($blogs->links()); ?>

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


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views\admin\pages\blog\index.blade.php ENDPATH**/ ?>