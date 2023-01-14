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
                                <h4>{{ $order->chef->fname }} {{ $order->chef->lname }}</h4>
                                <p>Orders Id: {{ $order->id }}</p>
                                <p>Order Created: {{ $order->created_at }}</p>
                                <p>Quantity: {{ $order->quantity }} {{ $order->type }}</p>
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
                                <h1>You don't have order today</h1>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
	</section>
</div>