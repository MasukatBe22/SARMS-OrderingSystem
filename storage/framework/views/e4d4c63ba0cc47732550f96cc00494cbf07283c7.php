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

        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('home/css/style.css')); ?>">
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body>
        <header>
            <div class="logo">
                <img src="<?php echo e(asset('logo/Logo.png')); ?>" alt="">
                <h3><?php echo e(setting('site_name')); ?></h3>
            </div>
            <nav>
                <li><a href="#home">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php endif; ?>
            </nav>
        </header>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.home-section', [])->html();
} elseif ($_instance->childHasBeenRendered('jMYMQOP')) {
    $componentId = $_instance->getRenderedChildComponentId('jMYMQOP');
    $componentTag = $_instance->getRenderedChildComponentTagName('jMYMQOP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jMYMQOP');
} else {
    $response = \Livewire\Livewire::mount('homepage.home-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('jMYMQOP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.menu-section', [])->html();
} elseif ($_instance->childHasBeenRendered('zJUyZDO')) {
    $componentId = $_instance->getRenderedChildComponentId('zJUyZDO');
    $componentTag = $_instance->getRenderedChildComponentTagName('zJUyZDO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zJUyZDO');
} else {
    $response = \Livewire\Livewire::mount('homepage.menu-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('zJUyZDO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('homepage.team-section', [])->html();
} elseif ($_instance->childHasBeenRendered('LqhNHex')) {
    $componentId = $_instance->getRenderedChildComponentId('LqhNHex');
    $componentTag = $_instance->getRenderedChildComponentTagName('LqhNHex');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LqhNHex');
} else {
    $response = \Livewire\Livewire::mount('homepage.team-section', []);
    $html = $response->html();
    $_instance->logRenderedChild('LqhNHex', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
</html><?php /**PATH C:\Users\masuk\SAROS\resources\views/welcome.blade.php ENDPATH**/ ?>