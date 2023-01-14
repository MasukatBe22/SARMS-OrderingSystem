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
} elseif ($_instance->childHasBeenRendered('hICNUGl')) {
    $componentId = $_instance->getRenderedChildComponentId('hICNUGl');
    $componentTag = $_instance->getRenderedChildComponentTagName('hICNUGl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('hICNUGl');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('hICNUGl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.product-count', [])->html();
} elseif ($_instance->childHasBeenRendered('s9S3iGj')) {
    $componentId = $_instance->getRenderedChildComponentId('s9S3iGj');
    $componentTag = $_instance->getRenderedChildComponentTagName('s9S3iGj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('s9S3iGj');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.product-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('s9S3iGj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.customer-count', [])->html();
} elseif ($_instance->childHasBeenRendered('Er2UaQn')) {
    $componentId = $_instance->getRenderedChildComponentId('Er2UaQn');
    $componentTag = $_instance->getRenderedChildComponentTagName('Er2UaQn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Er2UaQn');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.customer-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('Er2UaQn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <!-- small box -->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.chef-count', [])->html();
} elseif ($_instance->childHasBeenRendered('62ntjgg')) {
    $componentId = $_instance->getRenderedChildComponentId('62ntjgg');
    $componentTag = $_instance->getRenderedChildComponentTagName('62ntjgg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('62ntjgg');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.chef-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('62ntjgg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              </div>
              <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.order-status', [])->html();
} elseif ($_instance->childHasBeenRendered('MlM5HA1')) {
    $componentId = $_instance->getRenderedChildComponentId('MlM5HA1');
    $componentTag = $_instance->getRenderedChildComponentTagName('MlM5HA1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MlM5HA1');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.order-status', []);
    $html = $response->html();
    $_instance->logRenderedChild('MlM5HA1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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