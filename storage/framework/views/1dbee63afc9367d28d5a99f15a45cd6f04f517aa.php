<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'layouts.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div>
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
              
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.order-count', [])->html();
} elseif ($_instance->childHasBeenRendered('pA0gYJ2')) {
    $componentId = $_instance->getRenderedChildComponentId('pA0gYJ2');
    $componentTag = $_instance->getRenderedChildComponentTagName('pA0gYJ2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pA0gYJ2');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('pA0gYJ2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.product-count', [])->html();
} elseif ($_instance->childHasBeenRendered('PQvLBux')) {
    $componentId = $_instance->getRenderedChildComponentId('PQvLBux');
    $componentTag = $_instance->getRenderedChildComponentTagName('PQvLBux');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PQvLBux');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.product-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('PQvLBux', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                
                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.customer-count', [])->html();
} elseif ($_instance->childHasBeenRendered('sCSFn4O')) {
    $componentId = $_instance->getRenderedChildComponentId('sCSFn4O');
    $componentTag = $_instance->getRenderedChildComponentTagName('sCSFn4O');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sCSFn4O');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.customer-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('sCSFn4O', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.chef-count', [])->html();
} elseif ($_instance->childHasBeenRendered('x5LqnXf')) {
    $componentId = $_instance->getRenderedChildComponentId('x5LqnXf');
    $componentTag = $_instance->getRenderedChildComponentTagName('x5LqnXf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('x5LqnXf');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.chef-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('x5LqnXf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              </div>
              <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.totalsales', [])->html();
} elseif ($_instance->childHasBeenRendered('mG2Zs8m')) {
    $componentId = $_instance->getRenderedChildComponentId('mG2Zs8m');
    $componentTag = $_instance->getRenderedChildComponentTagName('mG2Zs8m');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mG2Zs8m');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.totalsales', []);
    $html = $response->html();
    $_instance->logRenderedChild('mG2Zs8m', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.order-status', [])->html();
} elseif ($_instance->childHasBeenRendered('Nr4AZbe')) {
    $componentId = $_instance->getRenderedChildComponentId('Nr4AZbe');
    $componentTag = $_instance->getRenderedChildComponentTagName('Nr4AZbe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Nr4AZbe');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-status', []);
    $html = $response->html();
    $_instance->logRenderedChild('Nr4AZbe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
          </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>