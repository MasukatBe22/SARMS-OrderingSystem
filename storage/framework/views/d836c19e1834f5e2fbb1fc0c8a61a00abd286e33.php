<div>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('logo/Logo.png')); ?>" alt="">
            <h3><?php echo e(setting('site_name')); ?></h3>
        </div>
        <nav>
            <li><a href="#home">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#order">Order</a></li>
            <li><a href="#contact">Contact</a></li>
            <?php if(Auth::user()->role === 'admin' || Auth::user()->role === 'chef'): ?>
                <li><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
            <?php else: ?>
                <li><a href="<?php echo e(route('order')); ?>" class='bx bxs-cart'></a></li>
                <?php if(!empty($Count)): ?>
                    <span wire:poll.keep-alive class="cart-number"><?php echo e($Count); ?></span>
                <?php endif; ?>
                <div class="dropdown">
                    <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="" class="dropbtn">
                    <div class="dropdown-content">
                    <a href="<?php echo e(route('account')); ?>"><i class='bx bxs-cog' ></i> Settings</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();"><i class='bx bx-log-out'></i> Logout</a>
                    </form>
                    </div>
                </div>
            <?php endif; ?>
        </nav>
    </header>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/homepage/home-nav.blade.php ENDPATH**/ ?>