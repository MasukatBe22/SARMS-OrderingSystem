<div>
    <header>
        <div class="logo">
            <img src="{{ asset('logo/Logo.png') }}" alt="">
            <h3>{{ setting('site_name') }}</h3>
        </div>
        <nav>
            <li><a href="#home">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#order">Order</a></li>
            <li><a href="#contact">Contact</a></li>
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'chef')
                <li><a href="{{ route('home') }}">Dashboard</a></li>
            @else
                <li><a href="{{ route('order') }}" class='bx bxs-cart'></a></li>
                @if (!empty($Count))
                    <span wire:poll.keep-alive class="cart-number">{{ $Count }}</span>
                @endif
                <div class="dropdown">
                    <img src="{{ auth()->user()->avatar_url }}" alt="" class="dropbtn">
                    <div class="dropdown-content">
                    <a href="{{ route('account') }}"><i class='bx bxs-cog' ></i> Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class='bx bx-log-out'></i> Logout</a>
                    </form>
                    </div>
                </div>
            @endif
        </nav>
    </header>
</div>