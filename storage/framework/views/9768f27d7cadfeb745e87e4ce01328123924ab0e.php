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
} elseif ($_instance->childHasBeenRendered('VXkDY0v')) {
    $componentId = $_instance->getRenderedChildComponentId('VXkDY0v');
    $componentTag = $_instance->getRenderedChildComponentTagName('VXkDY0v');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VXkDY0v');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('VXkDY0v', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('ta5eB67')) {
    $componentId = $_instance->getRenderedChildComponentId('ta5eB67');
    $componentTag = $_instance->getRenderedChildComponentTagName('ta5eB67');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ta5eB67');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('ta5eB67', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('SqUW4MV')) {
    $componentId = $_instance->getRenderedChildComponentId('SqUW4MV');
    $componentTag = $_instance->getRenderedChildComponentTagName('SqUW4MV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SqUW4MV');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('SqUW4MV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('qbFWHRn')) {
    $componentId = $_instance->getRenderedChildComponentId('qbFWHRn');
    $componentTag = $_instance->getRenderedChildComponentTagName('qbFWHRn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qbFWHRn');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('qbFWHRn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.order-section', [])->html();
} elseif ($_instance->childHasBeenRendered('qtWvNBW')) {
    $componentId = $_instance->getRenderedChildComponentId('qtWvNBW');
    $componentTag = $_instance->getRenderedChildComponentTagName('qtWvNBW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qtWvNBW');
} else {
    $response = \Livewire\Livewire::mount('homepage.order-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('qtWvNBW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.contact-section', [])->html();
} elseif ($_instance->childHasBeenRendered('oPzPMPC')) {
    $componentId = $_instance->getRenderedChildComponentId('oPzPMPC');
    $componentTag = $_instance->getRenderedChildComponentTagName('oPzPMPC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('oPzPMPC');
} else {
    $response = \Livewire\Livewire::mount('homepage.contact-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('oPzPMPC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <script type="text/javascript" src="<?php echo e(asset('home/js/script.js')); ?>"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    timer: 3000,
                });
            });
        </script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/layouts/homepage.blade.php ENDPATH**/ ?>