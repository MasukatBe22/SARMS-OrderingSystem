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
} elseif ($_instance->childHasBeenRendered('ElKwOjh')) {
    $componentId = $_instance->getRenderedChildComponentId('ElKwOjh');
    $componentTag = $_instance->getRenderedChildComponentTagName('ElKwOjh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ElKwOjh');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('ElKwOjh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('76YT2zI')) {
    $componentId = $_instance->getRenderedChildComponentId('76YT2zI');
    $componentTag = $_instance->getRenderedChildComponentTagName('76YT2zI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('76YT2zI');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('76YT2zI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('7BB838i')) {
    $componentId = $_instance->getRenderedChildComponentId('7BB838i');
    $componentTag = $_instance->getRenderedChildComponentTagName('7BB838i');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7BB838i');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('7BB838i', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('jHrFib6')) {
    $componentId = $_instance->getRenderedChildComponentId('jHrFib6');
    $componentTag = $_instance->getRenderedChildComponentTagName('jHrFib6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jHrFib6');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('jHrFib6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.order-section', [])->html();
} elseif ($_instance->childHasBeenRendered('GzrprL0')) {
    $componentId = $_instance->getRenderedChildComponentId('GzrprL0');
    $componentTag = $_instance->getRenderedChildComponentTagName('GzrprL0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GzrprL0');
} else {
    $response = \Livewire\Livewire::mount('homepage.order-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('GzrprL0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.contact-section', [])->html();
} elseif ($_instance->childHasBeenRendered('HsUs2ES')) {
    $componentId = $_instance->getRenderedChildComponentId('HsUs2ES');
    $componentTag = $_instance->getRenderedChildComponentTagName('HsUs2ES');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HsUs2ES');
} else {
    $response = \Livewire\Livewire::mount('homepage.contact-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('HsUs2ES', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <script type="text/javascript" src="<?php echo e(asset('home/js/script.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\Users\masuk\SAROS\resources\views/layouts/homepage.blade.php ENDPATH**/ ?>