<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="card">
                        <div class="card-body">
                            <h3>Queue Dashboard</h3>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th scope="col"><?php echo e($loop->iteration); ?></th>
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
                                            <th scope="col"><?php echo e($order->quantity); ?> <?php echo e($order->type); ?></th>
                                            <th scope="col"><?php echo e($order->created_at); ?></th>
                                            <th scope="col">
                                                <?php if( ($order->status) === 'Assigned' ): ?>
                                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php elseif( ($order->status) === 'Cooking' ): ?>
                                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php elseif( ($order->status) === 'Cancel' ): ?>
                                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php elseif( ($order->status) === 'Cooked' ): ?>
                                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php elseif( ($order->status) == 'Pick-up' ): ?>
                                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($order->status); ?></span>
                                                <?php endif; ?>
                                            </th>
                                            <th scope="col">
                                                    <div class="btn-group">
                                                        <button wire:click="setStatus1(<?php echo e($order); ?>)" type="button" style="width: 85px;" class="btn <?php echo e($order->status === 'Cooking' || $order->status === 'Cooked' || $order->status === 'Cancel' || $order->status === 'Pick-up' ? 'btn-warning disabled' : 'btn-outline-warning'); ?>">
                                                            <span style="font-size:100%; font-weight: bold;">Cooking</span>
                                                        </button>
                                                        <button wire:click="setStatus2(<?php echo e($order); ?>)" type="button" style="width: 85px;" class="btn <?php echo e($order->status === 'Cooked' || $order->status === 'Assigned' || $order->status === 'Cancel' || $order->status === 'Pick-up' ? 'btn-success disabled' : 'btn-outline-success'); ?>">
                                                            <span style="font-size:100%; font-weight: bold;">Done</span>
                                                        </button>
                                                    </div>
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

                    <div class="d-flex justify-content-end mb-2">
                        <div class="btn-group mt-3">
                            <button wire:click="filterOrder('Cancel')" type="button" class="btn <?php echo e(($status === 'Cancel') ? 'btn-secondary' : 'btn-default'); ?>">
                                <span class="mr-1">Cancel</span>
                                <span class="badge badge-pill badge-danger"><?php echo e($CancelOrder); ?></span>
                            </button>
                            <button wire:click="filterOrder('Pick-up')" type="button" class="btn <?php echo e(($status === 'Pick-up') ? 'btn-secondary' : 'btn-default'); ?>">
                                <span class="mr-1">Pick-up</span>
                                <span class="badge badge-pill badge-primary"><?php echo e($PickupOrder); ?></span>
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody wire:poll.keep-alive>
                                    <?php $__empty_1 = true; $__currentLoopData = $today; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tdy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th scope="col"><?php echo e($loop->iteration); ?></th>
                                            <th scope="col"><?php echo e($tdy->id); ?></th>
                                            <th scope="col"><?php echo e($tdy->customer->fname); ?> <?php echo e($tdy->customer->lname); ?></th>
                                            <th scope="col">
                                                <?php if($tdy->product->photo): ?>
                                                    <img src="<?php echo e(url('storage/photo/'.$tdy->product->photo)); ?>" style="width: 50px;" alt="photos" class="mr-2">
                                                <?php else: ?>
                                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                                <?php endif; ?>
                                                <?php echo e($tdy->product->title); ?>

                                            </th>
                                            <th scope="col"><?php echo e($tdy->quantity); ?> <?php echo e($tdy->type); ?></th>
                                            <th scope="col"><?php echo e($tdy->created_at); ?></th>
                                            <th scope="col">
                                                <?php if( ($tdy->status) === 'Assigned' ): ?>
                                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($tdy->status); ?></span>
                                                <?php elseif( ($tdy->status) === 'Cooking' ): ?>
                                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($tdy->status); ?></span>
                                                <?php elseif( ($tdy->status) === 'Cancel' ): ?>
                                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($tdy->status); ?></span>
                                                <?php elseif( ($tdy->status) === 'Cooked' ): ?>
                                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($tdy->status); ?></span>
                                                <?php elseif( ($tdy->status) == 'Pick-up' ): ?>
                                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($tdy->status); ?></span>
                                                <?php endif; ?>
                                            </th>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr class="text-center">
                                            <td colspan="7">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                            <p class="mt-2">No results found</p> 
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <?php echo e($today->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/livewire/chef/dashboard/chef-dashboard.blade.php ENDPATH**/ ?>