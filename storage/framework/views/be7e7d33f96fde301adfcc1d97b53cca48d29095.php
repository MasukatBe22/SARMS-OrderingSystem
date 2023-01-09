<div>
    <section class="menu" id="menu">
		<div class="center-text">
			<h3>Food Menu</h3>
			<h2>Delicious food</h2>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(url('storage/photo/'.$prod->photo)); ?>" alt="">
					</div>

					<div class="box-text">
						<h4><?php echo e($prod->title); ?></h4>
						<p><?php echo e($prod->description); ?></p>
						<div class="bottom-contents">
							<?php if(Auth::check() && Auth::user()->role === 'user'): ?>
								<?php if(DB::table('carts')->where('user_id', auth()->user()->id)->where('prod_id', $prod->id)->exists()): ?>
									<li style="background: #7dd87d; border-radius: 50%; height: 4rem; width: 4rem; transition: 1s linear;"><a href="" wire:click.prevent="addtoCart(<?php echo e($prod->id); ?>)" class='bx bxs-cart' style="line-height: 4rem; font-size: 2rem; color: #ffffff; display: flex; justify-content: center;"></a></li>
								<?php else: ?>
									<li><a href="" wire:click.prevent="addtoCart(<?php echo e($prod->id); ?>)" class='bx bxs-cart'></a></li>
								<?php endif; ?>
							<?php endif; ?>
							<h6>$<?php echo e($prod->price); ?></h6>
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
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<li><a href="" class='bx bxs-cart'></a></li>
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<li><a href="" class='bx bxs-cart'></a></li>
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<li><a href="" class='bx bxs-cart'></a></li>
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="<?php echo e(asset('noimage.png')); ?>" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<li><a href="" class='bx bxs-cart'></a></li>
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
            <?php endif; ?>
		</div>
	</section>
</div>
<?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/homepage/menu-section.blade.php ENDPATH**/ ?>