<div>
    <header>
        <div class="logo">
            <img src="{{ asset('logo/Logo.png') }}" alt="">
            <h3>{{ setting('site_name') }}</h3>
        </div>
        <nav>
			<li><a href="#cart">Cart</a></li>
			<li><a href="#menu">Menu</a></li>
			<li><a href="#history">	History</a></li>
            <li><a href="{{ route('home') }}">Dashboard</a></li>
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
        </nav>
    </header>

    <section class="menu" id="cart">
		<div class="center-text">
			<h3>Food Cart</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            @forelse ($carts as $cart)
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ url('storage/photo/'.$cart->product->photo) }}" alt="">
					</div>

					<div class="box-text">
						<h4>{{ $cart->product->title }}</h4>
						<p>{{ $cart->product->description }}</p>
                        <h6>${{ $cart->product->price }}</h6>
						<div class="order-contents-btn">
                            <a href="" wire:click.prevent="newOrder({{ $cart->prod_id }})" type="button">Order Now</a>
						</div>
						<div class="order-cart-btn">
							<a href="" wire:click.prevent="removeCart({{ $cart->id }})" type="button">Remove</a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</section>

    <section class="menu" id="menu">
		<div class="center-text">
			<h3>Menu</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            @forelse ($prods as $prod)
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ url('storage/photo/'.$prod->photo) }}" alt="">
					</div>

					<div class="box-text">
						<h4>{{ $prod->title }}</h4>
						<p>{{ $prod->description }}</p>
                        <h6>${{ $prod->price }}</h6>
						<div class="order-contents-btn">
                            <a href="" wire:click.prevent="newOrder({{ $prod->id }})" type="button">Order Now</a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</section>

	<section class="menu" id="history">
		<div class="center-text">
			<h3>Order History</h3>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            @forelse ($orders as $order)
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ url('storage/photo/'.$order->product->photo) }}" alt="">
					</div>

					<div class="box-text">
						<h4>{{ $order->product->title }}</h4>
						<p>{{ $order->product->description }}</p>
                        <h6>{{ $order->status }}</h6>
						<div class="order-history-btn">
							@if ($order->status === 'New' || $order->status === 'Assigned')
							<a href="" wire:click.prevent="cancelOrder({{ $order->id }})" type="button">Cancel</a>
							@else
							<a href="" type="button" style="display: none">Cancel</a>
							@endif
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</section>

	<div class="modal" id="modalORderform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Order Quantity</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form wire:submit.prevent="createOrder" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<input wire:model="quan" type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantity">

							@error('quantity')
								<div class="invalid-feedback">
									{{ $message}}
								</div>
							@enderror
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Confirm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>