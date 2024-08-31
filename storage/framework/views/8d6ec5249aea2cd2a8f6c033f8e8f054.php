<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
        <img src="<?php echo e(asset('adminlte/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Manager Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('adminlte/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo e(route('users.edit', ['id' => Auth::user()->id])); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('categories.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('menus.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('products.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('sliders.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('settings.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Cài đặt config
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('roles.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách vai trò
                        </p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH D:\shop\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>