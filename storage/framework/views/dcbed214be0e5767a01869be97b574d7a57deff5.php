<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="<?php echo e((auth()->user() != null) ? url(auth()->user()->url_avata) : ''); ?>" />
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5"><?php echo $__env->yieldContent('name_user'); ?>

                </div>
                <div class="fw-bold d-flex align-items-center fs-5 my-2">
                    <?php echo $__env->yieldContent('role_user'); ?>
                </div>

                <a href="#" class="fw-semibold fs-7 text-bold text-danger"><?php echo $__env->yieldContent('email_user'); ?></a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <?php if(auth()->user() != null): ?>
            <a href="<?php echo e(route('user.profile.view')); ?>/<?php echo e(auth()->user()->account_id); ?>" class="menu-link px-5">My Profile</a>
        <?php endif; ?>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" class="menu-link px-5">
            <span class="menu-text">My Projects</span>
            <span class="menu-badge">
													<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
												</span>
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" class="menu-link px-5">My Statements</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5 my-1">
        <a href="#" class="menu-link px-5">Account Settings</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="<?php echo e(route('login')); ?>" class="menu-link px-5">Sign Out</a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
<?php /**PATH G:\Laravel\resources\views/admin/includes/user.blade.php ENDPATH**/ ?>