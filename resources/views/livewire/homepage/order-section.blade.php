<div>
    <section class="order" id="order">
		<div class="center-text">
			<h3>Order Queue</h3>
		</div>

		<div wire:poll.keep-alive style="display: flex; justify-content: center; align-item: center; border-radius: 30px">
            <div class="order-content">
                <div class="order-text">
                    @forelse ($orders as $index => $order)
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="{{ url('storage/photo/'.$order->product->photo) }}">
                            </div>
                            
                            <div class="order-text">
                                <h6>#{{ $orders->firstItem() + $index }}<h6>
                                @if (Auth::user()->name === $order->customer->name )
                                <h4 style="color: #7dd87d;">{{ $order->customer->name }}</h4>
                                @else
                                <h4>{{ $order->customer->name }}</h4>
                                @endif
                                <p>Orders Id: {{ $order->id }}</p>
                                <h6>Orders Status: {{ $order->status }}</h6>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="{{ asset('noimage.png') }}">
                            </div>
                            
                            <div class="order-text">
                                <h6>#1<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="{{ asset('noimage.png') }}">
                            </div>
                            
                            <div class="order-text">
                                <h6>#2<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="{{ asset('noimage.png') }}">
                            </div>
                            
                            <div class="order-text">
                                <h6>#3<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    <div class="box-order">
                        <div class="box-order-content">
                            <div class="box-order-img">
                                <img src="{{ asset('noimage.png') }}">
                            </div>
                            
                            <div class="order-text">
                                <h6>#4<h6>
                                <h4>Sample</h4>
                                <p>Orders Id: ####</p>
                                <h6>Orders Status: Sample</h6>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
	</section>
</div>