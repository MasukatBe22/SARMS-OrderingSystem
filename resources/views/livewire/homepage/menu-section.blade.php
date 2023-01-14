<div>
    <section class="menu" id="menu">
		<div class="center-text">
			<h3>Food Menu</h3>
			<h2>Delicious food</h2>
		</div>

		<div wire:poll.keep-alive class="menu-content">
            @forelse ($products as $prod)
            <div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ url('storage/photo/'.$prod->photo) }}" alt="">
					</div>

					<div class="box-text">
						<h4>{{ $prod->title }}</h4>
						<p>{{ $prod->description }}</p>
						<div class="bottom-contents">
							@if (Auth::check() && Auth::user()->role === 'user')
								@if (DB::table('carts')->where('customer_id', auth()->user()->id)->where('product_id', $prod->id)->exists())
									<li style="background: #7dd87d; border-radius: 50%; height: 4rem; width: 4rem; transition: 1s linear;"><a href="" wire:click.prevent="addtoCart({{ $prod->id }})" class='bx bxs-cart' style="line-height: 4rem; font-size: 2rem; color: #ffffff; display: flex; justify-content: center;"></a></li>
								@else
									<li><a href="" wire:click.prevent="addtoCart({{ $prod->id }})" class='bx bxs-cart'></a></li>
								@endif
							@endif
							<h6>${{ $prod->price }}</h6>
						</div>
					</div>
				</div>
			</div>
			@empty
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ asset('noimage.png') }}" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ asset('noimage.png') }}" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ asset('noimage.png') }}" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="box-img">
						<img src="{{ asset('noimage.png') }}" alt="">
					</div>

					<div class="box-text">
						<h4>Sample</h4>
						<p>Sample</p>
						<div class="bottom-content">
							<h6>$##.##</h6>
						</div>
					</div>
				</div>
			</div>
            @endforelse
		</div>
	</section>
</div>
