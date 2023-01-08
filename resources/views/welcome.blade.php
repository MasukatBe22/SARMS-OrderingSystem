<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="refresh" content="60" >
        <title>{{ setting('site_title') }} | {{ setting('site_name') }}</title>

        <!-- favicon -->
        <link rel="icon" type="image/png" href="{{ asset('logo/Logo1.png') }}">

        <!-- icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
        @livewireStyles
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="{{ asset('logo/Logo.png') }}" alt="">
                <h3>{{ setting('site_name') }}</h3>
            </div>
            <nav>
                <li><a href="#home">Home</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
                @auth
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </nav>
        </header>

        <livewire:homepage.home-section />
        <livewire:homepage.menu-section />
        <livewire:homepage.team-section />
        
        <section class="contact" id="contact">
            <div class="contact-box">
                <h3>{{ setting('site_name') }}</h3>
                <h5>Find Us In</h5><br>
                <div class="address">
                    <i class='bx bxs-map' ><span>{{ setting('site_address') }}</span></i>
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
                    <i class='bx bxs-envelope' ><span>{{ setting('site_email') }}</span></i>
                    <i class='bx bxs-phone' ><span>{{ setting('site_mobile') }}</span></i>
                </div>
            </div>
    
        </section>
    
        <div class="end-text">
            <p>Copyright &copy; 2022 <a href="https://github.com/MasukatBe22">Masukat.Be22</a>. All rights reserved.</p> 
        </div>

        <script type="text/javascript" src="{{ asset('home/js/script.js') }}"></script>
        @livewireScripts
    </body>
</html>