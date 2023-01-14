<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <?php if( setting('sidebar_collapse') ? 'sidebar-collapse' : '' ): ?>
            <li class="nav-item" style="display: none;">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        <?php endif; ?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(url('/')); ?>" class="nav-link">Home</a>
        </li>
        <?php if( auth()->user()->role === 'admin' ): ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo e(route('admin.settings')); ?>" class="nav-link">Contact</a>
            </li>
        <?php endif; ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-cog mr-1"></i>
                <span class="font-weight-bold ml-1" x-ref="username"> <?php echo e(auth()->user()->fname); ?> <?php echo e(auth()->user()->lname); ?></span>
            </a>
            <?php if( auth()->user()->role === 'admin' ): ?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('admin.profile.edit')); ?>" x-ref="profileLink"><i class="fas fa-user mr-1"></i> Profile</a>
                    <a class="dropdown-item" href="<?php echo e(route('admin.profile.edit')); ?>" x-ref="changePasswordLink"><i class="fas fa-key mr-1"></i> Change Password</a>
                    <a class="dropdown-item" href="<?php echo e(route('admin.settings')); ?>"><i class="fas fa-cog mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                    </form>
                </div>
            <?php else: ?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('chef.profile.edit')); ?>" x-ref="chefProfileLink"><i class="fas fa-user mr-1"></i> Profile</a>
                    <a class="dropdown-item" href="<?php echo e(route('chef.profile.edit')); ?>" x-ref="chefProfileInfoLink"><i class="fas fa-info-circle mr-1"></i> User Info</a>
                    <a class="dropdown-item" href="<?php echo e(route('chef.settings')); ?>"><i class="fas fa-cog mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                    </form>
                </div>
            <?php endif; ?>
        </li>
    </ul>
</nav>
<?php /**PATH C:\Users\masuk\SAROS\resources\views/layouts/partials/navbar.blade.php ENDPATH**/ ?>