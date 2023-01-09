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
} elseif ($_instance->childHasBeenRendered('7gbfn1c')) {
    $componentId = $_instance->getRenderedChildComponentId('7gbfn1c');
    $componentTag = $_instance->getRenderedChildComponentTagName('7gbfn1c');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7gbfn1c');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('7gbfn1c', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.product-count', [])->html();
} elseif ($_instance->childHasBeenRendered('4zlTYUo')) {
    $componentId = $_instance->getRenderedChildComponentId('4zlTYUo');
    $componentTag = $_instance->getRenderedChildComponentTagName('4zlTYUo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4zlTYUo');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.product-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('4zlTYUo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.customer-count', [])->html();
} elseif ($_instance->childHasBeenRendered('osDDdyM')) {
    $componentId = $_instance->getRenderedChildComponentId('osDDdyM');
    $componentTag = $_instance->getRenderedChildComponentTagName('osDDdyM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('osDDdyM');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.customer-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('osDDdyM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.chef-count', [])->html();
} elseif ($_instance->childHasBeenRendered('qW6h1G3')) {
    $componentId = $_instance->getRenderedChildComponentId('qW6h1G3');
    $componentTag = $_instance->getRenderedChildComponentTagName('qW6h1G3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qW6h1G3');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.chef-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('qW6h1G3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              </div>
              <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.order-status', [])->html();
} elseif ($_instance->childHasBeenRendered('kPsUXN7')) {
    $componentId = $_instance->getRenderedChildComponentId('kPsUXN7');
    $componentTag = $_instance->getRenderedChildComponentTagName('kPsUXN7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('kPsUXN7');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-status', []);
    $html = $response->html();
    $_instance->logRenderedChild('kPsUXN7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php endif; ?><?php /**PATH C:\Users\masuk\SAROS\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>