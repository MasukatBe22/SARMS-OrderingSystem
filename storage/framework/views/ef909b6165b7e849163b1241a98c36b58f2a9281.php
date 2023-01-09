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
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody wire:poll.keep-alive>
                                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th scope="col"><?php echo e($loop->iteration); ?></th>
                                            <th scope="col"><?php echo e($order->id); ?></th>
                                            <th scope="col"><?php echo e($order->customer->name); ?></th>
                                            <th scope="col">
                                                <?php if($order->product->photo): ?>
                                                    <img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" style="width: 50px;" alt="photos" class="mr-2">
                                                <?php else: ?>
                                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                                <?php endif; ?>
                                                <?php echo e($order->product->title); ?>

                                            </th>
                                            <th scope="col"><?php echo e($order->quantity); ?></th>
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
                                                <?php if( ($order->status) === 'Cancel' || ($order->status) === 'Cooked' || ($order->status) === 'Pick-up'): ?>
                                                    <div class="btn-group">
                                                        <button type="button" style="width: 85px;" value="Cooking" class="btn btn-warning" disabled>
                                                            <span style="font-size:100%; font-weight: bold;">Cooking</span>
                                                        </button>
                                                        <button type="button" style="width: 85px;" value="Cooked" class="btn btn-success" disabled>
                                                            <span style="font-size:100%; font-weight: bold;">Done</span>
                                                        </button>
                                                    </div>
                                                <?php else: ?>   
                                                    <div class="btn-group">
                                                        <button wire:click="setStatus1(<?php echo e($order); ?>)" type="button" style="width: 85px;" class="btn <?php echo e(($order->status === 'Cooking') ? 'btn-warning' : 'btn-outline-warning'); ?>">
                                                            <span style="font-size:100%; font-weight: bold;">Cooking</span>
                                                        </button>
                                                        <button wire:click="setStatus2(<?php echo e($order); ?>)" type="button" style="width: 85px;" class="btn <?php echo e(($order->status === 'Cooked') ? 'btn-success' : 'btn-outline-success'); ?>">
                                                            <span style="font-size:100%; font-weight: bold;">Done</span>
                                                        </button>
                                                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/chef/dashboard/chef-dashboard.blade.php ENDPATH**/ ?>