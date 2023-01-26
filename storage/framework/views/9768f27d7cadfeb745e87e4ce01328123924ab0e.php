<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo e(setting('site_title')); ?> | <?php echo e(setting('site_name')); ?></title>

        <!-- favicon -->
        <link rel="icon" type="image/png" href="<?php echo e(asset('logo/Logo1.png')); ?>">

        <!-- icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/style.css')); ?>">

        <script type="text/javascript" src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('0n0MoGV')) {
    $componentId = $_instance->getRenderedChildComponentId('0n0MoGV');
    $componentTag = $_instance->getRenderedChildComponentTagName('0n0MoGV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0n0MoGV');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('0n0MoGV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('yrlF3PE')) {
    $componentId = $_instance->getRenderedChildComponentId('yrlF3PE');
    $componentTag = $_instance->getRenderedChildComponentTagName('yrlF3PE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yrlF3PE');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('yrlF3PE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('03hpwQu')) {
    $componentId = $_instance->getRenderedChildComponentId('03hpwQu');
    $componentTag = $_instance->getRenderedChildComponentTagName('03hpwQu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('03hpwQu');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('03hpwQu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('vmZ1bN6')) {
    $componentId = $_instance->getRenderedChildComponentId('vmZ1bN6');
    $componentTag = $_instance->getRenderedChildComponentTagName('vmZ1bN6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vmZ1bN6');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('vmZ1bN6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.order-section', [])->html();
} elseif ($_instance->childHasBeenRendered('6ruTlM8')) {
    $componentId = $_instance->getRenderedChildComponentId('6ruTlM8');
    $componentTag = $_instance->getRenderedChildComponentTagName('6ruTlM8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6ruTlM8');
} else {
    $response = \Livewire\Livewire::mount('homepage.order-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('6ruTlM8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.contact-section', [])->html();
} elseif ($_instance->childHasBeenRendered('PIZiGK7')) {
    $componentId = $_instance->getRenderedChildComponentId('PIZiGK7');
    $componentTag = $_instance->getRenderedChildComponentTagName('PIZiGK7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PIZiGK7');
} else {
    $response = \Livewire\Livewire::mount('homepage.contact-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('PIZiGK7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <script type="text/javascript" src="<?php echo e(asset('home/js/script.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/layouts/homepage.blade.php ENDPATH**/ ?>