<div>
	<header>
		<a href="#home" class="logo"><img src="<?php echo e(asset('logo/Logo.png')); ?>" alt=""></a>

        <div class="main">
            
                <li><a href="<?php echo e(route('home')); ?>" style="text-decoration: none">Dashboard</a></li>
            
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

        </div>
	</header>

    <section class="menu" id="cart">
		<div class="center-text" style="margin-top: 30px">
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
                            <a href="" wire:click.prevent="newCart(<?php echo e($cart->product_id); ?>)" type="button">Order Now</a>
						</div>
						<div class="order-cart-btn">
							<a href="" wire:click.prevent="removeCart(<?php echo e($cart->id); ?>)" type="button">Remove</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h1>Your cart is empty</h1>
					</div>
				</div>
			</div>
            <?php endif; ?>
		</div>
	</section>

    <section class="menu" id="menu">
		<div class="center-text">
			<h3>Menu</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_1 = true; $__currentLoopData = $prods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h1>Menu is Unavailable at the moment</h1>
					</div>
				</div>
			</div>
            <?php endif; ?>
		</div>
	</section>

	<section class="menu" id="history">
		<div class="center-text">
			<h3>Order History</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" alt="">
					</div>

					<div class="box-text">
						<h4><?php echo e($order->product->title); ?></h4>
						<p><?php echo e($order->product->description); ?></p>
						<p><?php echo e($order->quantity); ?> <?php echo e($order->type); ?></p>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h1>Your history is empty</h1>
					</div>
				</div>
			</div>
            <?php endif; ?>
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
						<div class="form-group" style="font-size: 25px">
							<label for="quantity"><?php echo e($type); ?>:</label>
							<input wire:model="quan" type="number" class="form-control mt-2 <?php $__errorArgs = ['quantity'];
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
	<div class="modal" id="OrderDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Order Details:</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="ml-5">
						<h4>Order: <?php echo e($name); ?></h4>
						<strong>Total Price: <?php echo e($total); ?></strong><br>
						<strong>Quantity: <?php echo e($quantity); ?> <?php echo e($type); ?></strong>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/livewire/user/orders-cart.blade.php ENDPATH**/ ?>