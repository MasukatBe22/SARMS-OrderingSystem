<div class="col-lg-12 mt-2" wire:poll.keep-alive x-data="{ total: false, today: true, yesterday: false, month: false, year: false }">
    <div class="d-flex justify-content-end mb-1">
        <div class="btn-group">
            <button x-on:click="total = true, today = false, yesterday = false, month = false, year = false" type="button" class="btn btn-default">
                <span class="mr-1">Total</span>
            </button>
            <button x-on:click="total = false, today = true, yesterday = false, month = false, year = false" type="button" class="btn btn-default">
                <span class="mr-1">Today</span>
            </button>
            <button x-on:click="total = false, today = false, yesterday = true, month = false, year = false" type="button" class="btn btn-default">
                <span class="mr-1">Yesterday</span>
            </button>
            <button x-on:click="total = false, today = false, yesterday = false, month = true, year = false" type="button" class="btn btn-default ">
                <span class="mr-1">Month</span>
            </button>
            <button x-on:click="total = false, today = false, yesterday = false, month = false, year = true" type="button" class="btn btn-default">
                <span class="mr-1">Year</span>
            </button>
        </div>
    </div>
    <div class="card" x-cloak x-show="total">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 style="font-weight: bold;">Total Orders</h4>
            </div>
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
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Total Price</th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($totals->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($total->id); ?></th>
                            <th scope="col"><?php echo e($total->customer->fname); ?> <?php echo e($total->customer->lname); ?></th>
                            <th scope="col"><?php echo e($total->customer->address); ?></th>
                            <th scope="col"><?php echo e($total->customer->mobile); ?></th>
                            <th scope="col">
                                <?php if($total->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$total->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($total->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($total->total); ?></th>
                            <th scope="col"><?php echo e($total->quantity); ?> <?php echo e($total->type); ?></th>
                            <th scope="col"><?php echo e($total->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($total->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php elseif( ($total->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php elseif( ($total->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php elseif( ($total->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php elseif( ($total->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php elseif( ($total->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($total->status); ?></span>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="11">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($totals->links()); ?>

        </div>
    </div>
    <div class="card" x-cloak x-show="today">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 style="font-weight: bold;">Today Orders</h4>
                <div class="btn-group">
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
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Total Price</th>
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
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($orders->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($order->id); ?></th>
                            <th scope="col"><?php echo e($order->customer->fname); ?> <?php echo e($order->customer->lname); ?></th>
                            <th scope="col"><?php echo e($order->customer->address); ?></th>
                            <th scope="col"><?php echo e($order->customer->mobile); ?></th>
                            <th scope="col">
                                <?php if($order->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$order->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($order->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($order->total); ?></th>
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
                            <td colspan="11">
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
    <div class="card" x-cloak x-show="yesterday">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 style="font-weight: bold;">Yesterday Orders</h4>
            </div>
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
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Total Price</th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $yesterdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $yesterday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($yesterdays->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($yesterday->id); ?></th>
                            <th scope="col"><?php echo e($yesterday->customer->fname); ?> <?php echo e($yesterday->customer->lname); ?></th>
                            <th scope="col"><?php echo e($yesterday->customer->address); ?></th>
                            <th scope="col"><?php echo e($yesterday->customer->mobile); ?></th>
                            <th scope="col">
                                <?php if($yesterday->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$yesterday->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($yesterday->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($yesterday->total); ?></th>
                            <th scope="col"><?php echo e($yesterday->quantity); ?> <?php echo e($yesterday->type); ?></th>
                            <th scope="col"><?php echo e($yesterday->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($yesterday->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php elseif( ($yesterday->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php elseif( ($yesterday->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php elseif( ($yesterday->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php elseif( ($yesterday->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php elseif( ($yesterday->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($yesterday->status); ?></span>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="11">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($yesterdays->links()); ?>

        </div>
    </div>
    <div class="card" x-cloak x-show="month">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 style="font-weight: bold;">This Month Orders</h4>
            </div>
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
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Total Price</th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($months->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($month->id); ?></th>
                            <th scope="col"><?php echo e($month->customer->fname); ?> <?php echo e($month->customer->lname); ?></th>
                            <th scope="col"><?php echo e($month->customer->address); ?></th>
                            <th scope="col"><?php echo e($month->customer->mobile); ?></th>
                            <th scope="col">
                                <?php if($month->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$month->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($month->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($month->total); ?></th>
                            <th scope="col"><?php echo e($month->quantity); ?> <?php echo e($month->type); ?></th>
                            <th scope="col"><?php echo e($month->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($month->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php elseif( ($month->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php elseif( ($month->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php elseif( ($month->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php elseif( ($month->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php elseif( ($month->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($month->status); ?></span>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="11">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($months->links()); ?>

        </div>
    </div>
    <div class="card" x-cloak x-show="year">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 style="font-weight: bold;">This Year Orders</h4>
            </div>
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
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted'); ?>"></i>
                                <i class="fa fa-arrow-down <?php echo e($sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted'); ?>"></i>
                            </span>
                        </th>
                        <th scope="col">Total Price</th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="col"><?php echo e($years->firstItem() + $index); ?></th>
                            <th scope="col"><?php echo e($year->id); ?></th>
                            <th scope="col"><?php echo e($year->customer->fname); ?> <?php echo e($year->customer->lname); ?></th>
                            <th scope="col"><?php echo e($year->customer->address); ?></th>
                            <th scope="col"><?php echo e($year->customer->mobile); ?></th>
                            <th scope="col">
                                <?php if($year->product->photo): ?>
                                    <img src="<?php echo e(url('storage/photo/'.$year->product->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($year->product->title); ?>

                            </th>
                            <th scope="col"><?php echo e($year->total); ?></th>
                            <th scope="col"><?php echo e($year->quantity); ?> <?php echo e($year->type); ?></th>
                            <th scope="col"><?php echo e($year->created_at); ?></th>
                            <th scope="col">
                                <?php if( ($year->status) == 'New' ): ?>
                                    <span class="badge badge-dark" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php elseif( ($year->status) == 'Assigned' ): ?>
                                    <span class="badge badge-info" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php elseif( ($year->status) == 'Cooking' ): ?>
                                    <span class="badge badge-warning" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php elseif( ($year->status) == 'Cooked' ): ?>
                                    <span class="badge badge-success" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php elseif( ($year->status) == 'Pick-up' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php elseif( ($year->status) == 'Cancel' ): ?>
                                    <span class="badge badge-danger" style="font-size:100%;"><?php echo e($year->status); ?></span>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="11">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <?php echo e($years->links()); ?>

        </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/livewire/admin/dashboard/order-status.blade.php ENDPATH**/ ?>