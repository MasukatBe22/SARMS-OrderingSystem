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
} elseif ($_instance->childHasBeenRendered('iRX65PU')) {
    $componentId = $_instance->getRenderedChildComponentId('iRX65PU');
    $componentTag = $_instance->getRenderedChildComponentTagName('iRX65PU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iRX65PU');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('iRX65PU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('PCthO95')) {
    $componentId = $_instance->getRenderedChildComponentId('PCthO95');
    $componentTag = $_instance->getRenderedChildComponentTagName('PCthO95');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PCthO95');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('PCthO95', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('5rwuTIa')) {
    $componentId = $_instance->getRenderedChildComponentId('5rwuTIa');
    $componentTag = $_instance->getRenderedChildComponentTagName('5rwuTIa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5rwuTIa');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('5rwuTIa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('8dx317U')) {
    $componentId = $_instance->getRenderedChildComponentId('8dx317U');
    $componentTag = $_instance->getRenderedChildComponentTagName('8dx317U');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8dx317U');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('8dx317U', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.order-section', [])->html();
} elseif ($_instance->childHasBeenRendered('U8NGRPv')) {
    $componentId = $_instance->getRenderedChildComponentId('U8NGRPv');
    $componentTag = $_instance->getRenderedChildComponentTagName('U8NGRPv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('U8NGRPv');
} else {
    $response = \Livewire\Livewire::mount('homepage.order-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('U8NGRPv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.contact-section', [])->html();
} elseif ($_instance->childHasBeenRendered('332SeCV')) {
    $componentId = $_instance->getRenderedChildComponentId('332SeCV');
    $componentTag = $_instance->getRenderedChildComponentTagName('332SeCV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('332SeCV');
} else {
    $response = \Livewire\Livewire::mount('homepage.contact-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('332SeCV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <script type="text/javascript" src="<?php echo e(asset('home/js/script.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\Users\masuk\SAROS\resources\views/layouts/homepage.blade.php ENDPATH**/ ?>