<div class="col-lg-12">
    <div class="d-flex justify-content-center mb-2">
        <div class="btn-group">
            <button wire:click="filterOrder" type="button" class="btn {{ is_null($status) ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">All</span>
                <span class="badge badge-pill badge-light">{{ $AllOrder }}</span>
            </button>
            <button wire:click="filterOrder('New')" type="button" class="btn {{ ($status === 'New') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">New</span>
                <span class="badge badge-pill badge-dark">{{ $newOrder }}</span>
            </button>
            <button wire:click="filterOrder('Assigned')" type="button" class="btn {{ ($status === 'Assigned') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">Assigned</span>
                <span class="badge badge-pill badge-info">{{ $AssignedOrder }}</span>
            </button>
            <button wire:click="filterOrder('Cooking')" type="button" class="btn {{ ($status === 'Cooking') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">Cooking</span>
                <span class="badge badge-pill badge-warning">{{ $CookingOrder }}</span>
            </button>
            <button wire:click="filterOrder('Cooked')" type="button" class="btn {{ ($status === 'Cooked') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">Cooked</span>
                <span class="badge badge-pill badge-success">{{ $CookedOrder }}</span>
            </button>
            <button wire:click="filterOrder('Pick-up')" type="button" class="btn {{ ($status === 'Pick-up') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">Pick-up</span>
                <span class="badge badge-pill badge-primary">{{ $PickupOrder }}</span>
            </button>
            <button wire:click="filterOrder('Cancel')" type="button" class="btn {{ ($status === 'Cancel') ? 'btn-secondary' : 'btn-default' }}">
                <span class="mr-1">Cancel</span>
                <span class="badge badge-pill badge-danger">{{ $CancelOrder }}</span>
            </button>
          </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Chef</th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ($orders as $index => $order)
                        <tr>
                            <th scope="col">{{ $orders->firstItem() + $index }}</th>
                            <th scope="col">{{ $order->id }}</th>
                            <th scope="col">{{ $order->customer->name }}</th>
                            <th scope="col">
                                @if ($order->product->photo)
                                    <img src="{{ url('storage/photo/'.$order->product->photo) }}" style="width: 50px;" alt="photos" class="mr-2">
                                @else
                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                @endif
                                {{ $order->product->title }}
                            </th>
                            <th scope="col">{{ $order->quantity }}</th>
                            <th scope="col">{{ $order->created_at }}</th>
                            <th scope="col">
                                @if ( ($order->status) == 'New' )
                                    <span class="badge badge-dark" style="font-size:100%;">{{ $order->status }}</span>
                                @elseif ( ($order->status) == 'Assigned' )
                                    <span class="badge badge-info" style="font-size:100%;">{{ $order->status }}</span>
                                @elseif ( ($order->status) == 'Cooking' )
                                    <span class="badge badge-warning" style="font-size:100%;">{{ $order->status }}</span>
                                @elseif ( ($order->status) == 'Cooked' )
                                    <span class="badge badge-success" style="font-size:100%;">{{ $order->status }}</span>
                                @elseif ( ($order->status) == 'Pick-up' )
                                    <span class="badge badge-primary" style="font-size:100%;">{{ $order->status }}</span>
                                @elseif ( ($order->status) == 'Cancel' )
                                    <span class="badge badge-danger" style="font-size:100%;">{{ $order->status }}</span>
                                @endif
                            </th>
                            <th scope="col">{{ $order->chef->name }}</th>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="8">
                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                            <p class="mt-2">No results found</p> 
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{ $orders->links() }}
        </div>
    </div>
</div>