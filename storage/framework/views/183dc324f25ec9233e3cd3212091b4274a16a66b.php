<?php $__env->startSection('title_page'); ?>
    Request staff - <?php echo e(config('app.name')); ?>

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
        $menu_parent = 'contact';
        $menu_child = 'request';
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_component'); ?>
    Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title_layout'); ?>
    request_staff
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions_layout'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_card'); ?>
    Yêu cầu làm nhân viên
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
    <?php if(!empty(auth()->user()->account->requestStaff)): ?>
        <div class="row justify-content-center">
            <div class="card bg-info mb-5 col col-lg-6">
                <div class="card-body">
                    <h2 class="card-title">Yêu cầu của bạn</h2>
                    <h6>Tôi của bạn: <?php echo e(auth()->user()->account->requestStaff->fullname); ?></h6>
                    <h6>Ngày sinh: <?php echo e(date('d-m-Y', strtotime(auth()->user()->account->requestStaff->birthday))); ?></h6>
                    <h6>Tin nhắn: <?php echo e(auth()->user()->account->requestStaff->message); ?></h6>
                    <h6>Yêu cầu được tạo lúc: <?php echo e(auth()->user()->account->requestStaff->updated_at); ?></h6>
                    <h6>Trạng thái:
                        <span class="badge badge-<?php echo e(auth()->user()->account->requestStaff->status->color); ?>">
                            <?php echo e(auth()->user()->account->requestStaff->status->status_name); ?>

                        </span>
                    </h6>
                    <a href="#" class="btn btn-primary">Sửa yêu cầu</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(empty(auth()->user()->account->requestStaff)): ?>
    <form action="" method="post" class="py-5">
        <h3>Điền thông tin</h3>
        <?php echo csrf_field(); ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Thông tin chưa hợp lệ</div>
            </div>
        <?php endif; ?>
        <div class="form-group my-2">
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ và tên">
            <?php $__errorArgs = ['fullname'];
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
        <div class="form-group my-2">
            <label for="birthday">Ngày sinh</label>
            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Ngày sinh">
            <?php $__errorArgs = ['birthday'];
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
        <div class="form-group my-2">
            <label for="link_facebook">Link facebook</label>
            <input type="text" class="form-control" id="link_facebook" name="link_facebook" placeholder="https://www.facebook.com/username">
            <?php $__errorArgs = ['link_facebook'];
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

        <div class="form-group my-2">
            <label for="message">Lời nhắn</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="Xin chào admin">
            <?php $__errorArgs = ['message'];
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
            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
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


<?php echo $__env->make('user.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Laravel\resources\views\user\pages\request_staff.blade.php ENDPATH**/ ?>