<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6"> 
              <h1 class="m-0 text-dark">Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div>
          </div>
        </div>
    </div>
    
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                      <a href="<?php echo e(route('admin.products.create')); ?>">
                        <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Add Products</button>
                      </a>
                      <?php if($selectedRows): ?>
                      <div class="btn-group ml-2">
                        <button type="button" class="btn btn-default">Bulk Actions</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                          <a wire:click.prevent="markAllAsAvailable" class="dropdown-item" href="#">Mark as Available</a>
                          <a wire:click.prevent="markAllAsUnavailable" class="dropdown-item" href="#">Mark as Unavailable</a>
                        </div>
                      </div>
                      <span class="ml-2">selected <?php echo e(count($selectedRows)); ?> <?php echo e(Str::plural('product',  count($selectedRows))); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="btn-group">
                      <button wire:click="filterProduct" type="button" class="btn <?php echo e(is_null($status) ? 'btn-secondary' : 'btn-default'); ?>">
                        <span class="mr-1">All</span>
                        <span class="badge badge-pill badge-info"><?php echo e($ProductsCount); ?></span>
                      </button>
                      <button wire:click="filterProduct('Available')" type="button" class="btn <?php echo e(($status === 'Available') ? 'btn-secondary' : 'btn-default'); ?>">
                        <span class="mr-1">Available</span>
                        <span class="badge badge-pill badge-primary"><?php echo e($AvailableProductsCount); ?></span>
                      </button>
                      <button wire:click="filterProduct('Unavailable')" type="button" class="btn <?php echo e(($status === 'Unavailable') ? 'btn-secondary' : 'btn-default'); ?>">
                        <span class="mr-1">Unavailable</span>
                        <span class="badge badge-pill badge-secondary"><?php echo e($UnavailableProductsCount); ?></span>
                      </button>
                    </div>
                </div>

              <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                              <th>
                                <div class="icheck-primary d-inline ml-2">
                                  <input wire:model="selectPageRows" type="checkbox" value="" name="checkbox" id="checkbox">
                                  <label for="checkbox"></label>
                                </div>
                              </th>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody wire:loading.class="text-muted">
                          <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <th>
                                <div class="icheck-primary d-inline ml-2">
                                  <input wire:model="selectedRows" type="checkbox" value="<?php echo e($prod->id); ?>" name="todo2" id="<?php echo e($prod->id); ?>">
                                  <label for="<?php echo e($prod->id); ?>"></label>
                                </div>
                              </th>
                              <th scope="row"><?php echo e($products->firstItem() + $index); ?></th>
                              <td style="display: flex;">
                                <?php if($prod->photo): ?>
                                  <img src="<?php echo e(url('storage/photo/'.$prod->photo)); ?>" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                <?php else: ?>
                                  <img src="<?php echo e(asset('noimage.png')); ?>" style="width: 50px;" alt="photos" class="mr-2">
                                <?php endif; ?>
                                <?php echo e($prod->title); ?>

                              </td>
                              <td>$<?php echo e($prod->price); ?></td>
                              <td><?php echo e($prod->description); ?></td>
                              <td>
                                  <?php if( ($prod->status) == 'Available' ): ?>
                                    <span class="badge badge-primary" style="font-size:100%;">Available</span>
                                  <?php elseif( ($prod->status) == 'Unavailable' ): ?>
                                    <span class="badge badge-secondary" style="font-size:100%;">Unavailable</span>
                                  <?php endif; ?>
                              </td>
                              <td>
                                  <a href="" wire:click.prevent="edit(<?php echo e($prod->id); ?>)">
                                    <i class="fa fa-edit mr-2"></i>
                                  </a>
                                  <a href="" wire:click.prevent="confirmProductRemoval(<?php echo e($prod->id); ?>)">
                                      <i class="fa fa-trash text-danger"></i>
                                  </a>
                              </td>
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
                      <?php echo e($products->links()); ?>

                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog" role="document">
        <form autocomplete="off" wire:submit.prevent="updateProduct">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="form">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Product:</label>
                <input wire:model.defer="state.title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['title'];
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
              <div class="form-group">
                <label for="price">Price:</label>
                <input wire:model.defer="state.price" type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" step="any">
                <?php $__errorArgs = ['price'];
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
              <div class="form-group">
                <label for="status">Status:</label>
                <select wire:model.defer="state.status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" id="status">
                    <option value="" disabled>-----</option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
                <?php $__errorArgs = ['status'];
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
              <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.description-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('description-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Delete Product</h5>
          </div>

          <div class="modal-body">
            <h4>Are you sure you want to delete this Product?</h4>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
            <button type="submit" wire:click.prevent="deleteProduct" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete Product</button>
          </div>
        </div>
      </div>
    </div>
</div><?php /**PATH C:\Users\masuk\SAROS\resources\views/livewire/admin/products/list-products.blade.php ENDPATH**/ ?>