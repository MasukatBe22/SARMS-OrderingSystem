<div>
    <section class="order" id="order">
		<div class="center-text">
			<h3>Order Queue</h3>
		</div>

		<div wire:poll.keep-alive style="display: flex; justify-content: center; align-item: center; border-radius: 30px">
            <div class="order-content">
                <div class="order-text">
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>">
                            </div>
                            
                            <div class="order-text">
                                <h6>#<?php echo e($orders->firstItem() + $index); ?><h6>
                                <?php if(Auth::user()->name === $order->customer->name ): ?>
                                <h4 style="color: #7dd87d;"><?php echo e($order->customer->name); ?></h4>
                                <?php else: ?>
                                <h4><?php echo e($order->customer->name); ?></h4>
                                <?php endif; ?>
                                <p>Orders Id: <?php echo e($order->id); ?></p>
                                <h6>Orders Status: <?php echo e($order->status); ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="<?php echo e(asset('noimage.png')); ?>">
                            </div>
                            
                            <div class="order-text">
                                <h6>#1<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="<?php echo e(asset('noimage.png')); ?>">
                            </div>
                            
                            <div class="order-text">
                                <h6>#2<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="<?php echo e(asset('noimage.png')); ?>">
                            </div>
                            
                            <div class="order-text">
                                <h6>#3<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="<?php echo e(asset('noimage.png')); ?>">
                            </div>
                            
                            <div class="order-text">
                                <h6>#4<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</section>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/homepage/order-section.blade.php ENDPATH**/ ?>