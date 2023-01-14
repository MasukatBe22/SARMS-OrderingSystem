<div class="col-lg-12">
    <div class="d-flex justify-content-center mb-2">
        <div class="btn-group mt-3">
            <button wire:click="filterOrder" type="button" class="btn <?php echo e(is_null($status) ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">All</span>
                <span class="badge badge-pill badge-light"><?php echo e($AllOrder); ?></span>
            </button>
            <button wire:click="filterOrder('New')" type="button" class="btn <?php echo e(($status === 'New') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">New</span>
                <span class="badge badge-pill badge-dark"><?php echo e($newOrder); ?></span>
            </button>
            <button wire:click="filterOrder('Assigned')" type="button" class="btn <?php echo e(($status === 'Assigned') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">Assigned</span>
                <span class="badge badge-pill badge-info"><?php echo e($AssignedOrder); ?></span>
            </button>
            <button wire:click="filterOrder('Cooking')" type="button" class="btn <?php echo e(($status === 'Cooking') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">Cooking</span>
                <span class="badge badge-pill badge-warning"><?php echo e($CookingOrder); ?></span>
            </button>
            <button wire:click="filterOrder('Cooked')" type="button" class="btn <?php echo e(($status === 'Cooked') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">Cooked</span>
                <span class="badge badge-pill badge-success"><?php echo e($CookedOrder); ?></span>
            </button>
            <button wire:click="filterOrder('Pick-up')" type="button" class="btn <?php echo e(($status === 'Pick-up') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">Pick-up</span>
                <span class="badge badge-pill badge-primary"><?php echo e($PickupOrder); ?></span>
            </button>
            <button wire:click="filterOrder('Cancel')" type="button" class="btn <?php echo e(($status === 'Cancel') ? 'btn-secondary' : 'btn-default'); ?>">
                <span class="mr-1">Cancel</span>
                <span class="badge badge-pill badge-danger"><?php echo e($CancelOrder); ?></span>
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 style="font-weight: bold;">Today Orders</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id
                            <span wire:click="sortBy('id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Customer
                            <span wire:click="sortBy('customer_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'customer_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'customer_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity
                            <span wire:click="sortBy('quantity')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'quantity' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'quantity' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Order Date
                            <span wire:click="sortBy('created_at')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Status
                            <span wire:click="sortBy('status')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'status' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'status' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody wire:poll.keep-alive>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($orders->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($order->id); ?></th>
                            <th scope="col"><?php echo e($order->customer->fname); ?> <?php echo e($order->customer->lname); ?></th>
                            <th scope="col">
                                <?php if($order->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" style="width: 50px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($order->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($order->product->price); ?></th>
                            <th scope="col"><?php echo e($order->quantity); ?> <?php echo e($order->type); ?></th>
                            <th scope="col"><?php echo e($order->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($order->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php elseif( ($order->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php elseif( ($order->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php elseif( ($order->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php elseif( ($order->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php elseif( ($order->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                <?php endif; ?>
                            </th>
                            <th scope="col">
                                    <div class="btn-group">
                                        <button wire:click="setStatus1(<?php echo e($order); ?>)" type="button" style="width: 85px;" value="Cooked" class="btn <?php echo e($order->status === 'New' || $order->status === 'Assigned' || $order->status === 'Cooking' || $order->status === 'Pick-up' || $order->status === 'Cancel' ? 'btn-primary disabled' : 'btn-outline-primary'); ?>">
                                            <span style="font-size:100%; font-weight: bold;">Pick-up</span>
                                        </button>
                                    </div>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="9">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($orders->links()); ?>

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 style="font-weight: bold;">Orders Table</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody wire:poll.keep-alive>
                    <?php $__empty_1 = true; $__currentLoopData = $everything; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($everything->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($all->id); ?></th>
                            <th scope="col"><?php echo e($order->customer->fname); ?> <?php echo e($order->customer->lname); ?></th>
                            <th scope="col">
                                <?php if($all->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$all->product->photo)); ?>" style="width: 50px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($all->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($all->product->price); ?></th>
                            <th scope="col"><?php echo e($all->quantity); ?> <?php echo e($all->type); ?></th>
                            <th scope="col"><?php echo e($all->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($all->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php elseif( ($all->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php elseif( ($all->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php elseif( ($all->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php elseif( ($all->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php elseif( ($all->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($all->status); ?></span>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="8">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($everything->links()); ?>

        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/admin/dashboard/order-status.blade.php ENDPATH**/ ?>