<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="refresh" content="60" >
        <title><?php echo e(setting('site_title')); ?> | <?php echo e(setting('site_name')); ?></title>

        <!-- favicon -->
        <link rel="icon" type="image/png" href="<?php echo e(asset('logo/Logo1.png')); ?>">

        <!-- icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/style.css')); ?>">
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body>
        <header>
            <a href="#home" class="logo"><img src="<?php echo e(asset('logo/Logo.png')); ?>" alt=""><span><?php echo e(setting('site_name')); ?></span></a>

            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="main">
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="user"><i class="ri-user-fill"></i>Sign In</a>
                    <a href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </header>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('K5MB06Z')) {
    $componentId = $_instance->getRenderedChildComponentId('K5MB06Z');
    $componentTag = $_instance->getRenderedChildComponentTagName('K5MB06Z');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('K5MB06Z');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('K5MB06Z', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('DAczI8z')) {
    $componentId = $_instance->getRenderedChildComponentId('DAczI8z');
    $componentTag = $_instance->getRenderedChildComponentTagName('DAczI8z');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DAczI8z');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('DAczI8z', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('P2IqvAo')) {
    $componentId = $_instance->getRenderedChildComponentId('P2IqvAo');
    $componentTag = $_instance->getRenderedChildComponentTagName('P2IqvAo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('P2IqvAo');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('P2IqvAo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        
        <section class="contact" id="contact">
            <div class="contact-box">
                <h3><?php echo e(setting('site_name')); ?></h3>
                <h5>Find Us In</h5><br>
                <div class="address">
                    <i class='bx bxs-map' ><span><?php echo e(setting('site_address')); ?></span></i>
                </div>
            </div>
    
            <div class="contact-box">
                <h3>Menu Links</h3>
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#team">Team</a></li>
            </div>
            
            <div class="contact-box">
                <div class="address">
                    <h3>Contact</h3>
                    <i class='bx bxs-envelope' ><span><?php echo e(setting('site_email')); ?></span></i>
                    <i class='bx bxs-phone' ><span><?php echo e(setting('site_mobile')); ?></span></i>
                </div>
            </div>
    
        </section>
    
        <div class="end-text">
            <p>Copyright &copy; 2022 <a href="https://github.com/MasukatBe22">Masukat.Be22</a>. All rights reserved.</p> 
        </div>

        <script type="text/javascript" src="<?php echo e(asset('home/js/script.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\Users\masuk\SAWMS\SAROS-orderSYS\resources\views/welcome.blade.php ENDPATH**/ ?>