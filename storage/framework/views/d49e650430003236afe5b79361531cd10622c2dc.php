<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
     data-kt-menu-expand="false">
    <?php
        $menus = config('menu_staff');
    ?>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php if( $menu_parent == $menu['name']): ?> hover show  <?php endif; ?> ">
            <!--begin:Menu link-->
            <span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/art/art007.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor"/>
<path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="currentColor"/>

													</svg>
												</span>
                                                <!--end::Svg Icon-->
											</span>
											<span class="menu-title"><?php echo e($menu['title']); ?></span>
											<span class="menu-arrow"></span>
										</span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <?php if(isset($menu['children']) && count($menu['children']) > 0): ?>
                <div class="menu-sub menu-sub-accordion " kt-hidden-height="121" style="">
                    <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link <?php if($menu_parent == $menu['name'] && $menu_child == $item['name']): ?> active <?php endif; ?> " href="<?php if(isset($item['route'])): ?> <?php echo e(route($item['route'])); ?> <?php else: ?> # <?php endif; ?>">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                <span class="menu-title"><?php echo e($item['title']); ?></span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!--end:Menu sub-->
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</div>
<?php /**PATH G:\Laravel\resources\views/staff/includes/menus.blade.php ENDPATH**/ ?>