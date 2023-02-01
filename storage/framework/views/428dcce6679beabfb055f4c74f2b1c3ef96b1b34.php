<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0 text-dark">Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-2">
                        <div class="btn-group">
                            <button wire:click="filterOrder('New')" type="button" class="btn <?php echo e(($status === 'New') ? 'btn-secondary' : 'btn-default'); ?>">
                                <span class="mr-1">New</span>
                                <span class="badge badge-pill badge-dark"><?php echo e($newOrder); ?></span>
                            </button>
                            <button wire:click="filterOrder('Assigned')" type="button" class="btn <?php echo e(($status === 'Assigned') ? 'btn-secondary' : 'btn-default'); ?>">
                                <span class="mr-1">Assigned</span>
                                <span class="badge badge-pill badge-info"><?php echo e($AssignedOrder); ?></span>
                            </button>
                          </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Chef</th>
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
                                                    <img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                                <?php else: ?>
                                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                                <?php endif; ?>
                                                <?php echo e($order->product->title); ?>

                                            </th>
                                            <th scope="col"><?php echo e($order->quantity); ?></th>
                                            <th scope="col"><?php echo e($order->created_at); ?></th>
                                            <th scope="col">
                                                <?php if( ($order->status) == 'New' ): ?>
                                                    <span class="badge badge-secondary" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php elseif( ($order->status) == 'Assigned' ): ?>
                                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php endif; ?>
                                            </th>
                                            <th scope="col">
                                                <select class="form-control" wire:change="setChef(<?php echo e($order); ?>, $event.target.value)" >
                                                    <option value="" <?php echo e(is_null($order->chef_id) ? "selected disabled" : ""); ?>>Select Chef</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($user->id); ?>" <?php echo e($order->chef_id === $user->id ? "selected" : ""); ?>><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
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
                            <?php echo e($orders->links()); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/livewire/admin/orders/list-orders.blade.php ENDPATH**/ ?>