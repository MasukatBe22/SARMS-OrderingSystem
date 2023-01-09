<div>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('logo/Logo.png')); ?>" alt="">
            <h3><?php echo e(setting('site_name')); ?></h3>
        </div>
        <nav>
			<li><a href="#cart">Cart</a></li>
			<li><a href="#menu">Menu</a></li>
			<li><a href="#history">	History</a></li>
            <li><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
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
        </nav>
    </header>

    <section class="menu" id="cart">
		<div class="center-text">
			<h3>Food Cart</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(url('storage/photo/'.$cart->product->photo)); ?>" alt="">
					</div>

					<div class="box-text">
						<h4><?php echo e($cart->product->title); ?></h4>
						<p><?php echo e($cart->product->description); ?></p>
                        <h6>$<?php echo e($cart->product->price); ?></h6>
						<div class="order-contents-btn">
                            <a href="" wire:click.prevent="newOrder(<?php echo e($cart->prod_id); ?>)" type="button">Order Now</a>
						</div>
						<div class="order-cart-btn">
							<a href="" wire:click.prevent="removeCart(<?php echo e($cart->id); ?>)" type="button">Remove</a>
						</div>
					</div>
				</div>
			</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</section>

    <section class="menu" id="menu">
		<div class="center-text">
			<h3>Menu</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_2 = true; $__currentLoopData = $prods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(url('storage/photo/'.$prod->photo)); ?>" alt="">
					</div>

					<div class="box-text">
						<h4><?php echo e($prod->title); ?></h4>
						<p><?php echo e($prod->description); ?></p>
                        <h6>$<?php echo e($prod->price); ?></h6>
						<div class="order-contents-btn">
                            <a href="" wire:click.prevent="newOrder(<?php echo e($prod->id); ?>)" type="button">Order Now</a>
						</div>
					</div>
				</div>
			</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</section>

	<section class="menu" id="history">
		<div class="center-text">
			<h3>Order History</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_3 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" alt="">
					</div>

					<div class="box-text">
						<h4><?php echo e($order->product->title); ?></h4>
						<p><?php echo e($order->product->description); ?></p>
                        <h6><?php echo e($order->status); ?></h6>
						<div class="order-history-btn">
							<?php if($order->status === 'New' || $order->status === 'Assigned'): ?>
							<a href="" wire:click.prevent="cancelOrder(<?php echo e($order->id); ?>)" type="button">Cancel</a>
							<?php else: ?>
							<a href="" type="button" style="display: none">Cancel</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</section>

	<div class="modal" id="modalORderform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Order Quantity</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form wire:submit.prevent="createOrder" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<input wire:model="quan" type="number" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="quantity" placeholder="Quantity">

							<?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="invalid-feedback">
									<?php echo e($message); ?>

								</div>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Confirm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/user/orders-cart.blade.php ENDPATH**/ ?>