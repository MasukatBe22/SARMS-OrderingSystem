<div class="col-lg-12">
    <div class="d-flex justify-content-center mb-2">
        <div class="btn-group mt-3">
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
            <h4 style="font-weight: bold;">Today Orders</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id
                            <span wire:click="sortBy('id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Customer
                            <span wire:click="sortBy('customer_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'customer_id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'customer_id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Product
                            <span wire:click="sortBy('product_id')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'product_id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'product_id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity
                            <span wire:click="sortBy('quantity')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'quantity' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'quantity' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Order Date
                            <span wire:click="sortBy('created_at')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Status
                            <span wire:click="sortBy('status')" class="float-right" style="cursor: pointer">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'status' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'status' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody wire:poll.keep-alive>
                    @forelse ($orders as $index => $order)
                        <tr>
                            <th scope="col">{{ $orders->firstItem() + $index }}</th>
                            <th scope="col">{{ $order->id }}</th>
                            <th scope="col">{{ $order->customer->fname }} {{ $order->customer->lname }}</th>
                            <th scope="col">{{ $order->customer->address }}</th>
                            <th scope="col">{{ $order->customer->mobile }}</th>
                            <th scope="col">
                                @if ($order->product->photo)
                                    <img src="{{ url('storage/photo/'.$order->product->photo) }}" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                @else
                                    <img src="" style="width: 50px; height: 35px;" alt="photos" class="mr-2">
                                @endif
                                {{ $order->product->title }}
                            </th>
                            <th scope="col">{{ $order->product->price }}</th>
                            <th scope="col">{{ $order->quantity }} {{ $order->type }}</th>
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
                            <th scope="col">
                                    <div class="btn-group">
                                        <button wire:click="setStatus1({{ $order }})" type="button" style="width: 85px;" value="Cooked" class="btn {{ $order->status === 'New' || $order->status === 'Assigned' || $order->status === 'Cooking' || $order->status === 'Pick-up' || $order->status === 'Cancel' ? 'btn-primary disabled' : 'btn-outline-primary' }}">
                                            <span style="font-size:100%; font-weight: bold;">Pick-up</span>
                                        </button>
                                    </div>
                            </th>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="11">
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
    <div class="card">
        <div class="card-body">
            <h4 style="font-weight: bold;">Orders Table</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody wire:poll.keep-alive>
                    @forelse ($everything as $index => $all)
                        <tr>
                            <th scope="col">{{ $everything->firstItem() + $index }}</th>
                            <th scope="col">{{ $all->id }}</th>
                            <th scope="col">{{ $order->customer->fname }} {{ $order->customer->lname }}</th>
                            <th scope="col">
                                @if ($all->product->photo)
                                    <img src="{{ url('storage/photo/'.$all->product->photo) }}" style="width: 50px;" alt="photos" class="mr-2">
                                @else
                                    <img src="" style="width: 50px;" alt="photos" class="mr-2">
                                @endif
                                {{ $all->product->title }}
                            </th>
                            <th scope="col">{{ $all->product->price }}</th>
                            <th scope="col">{{ $all->quantity }} {{ $all->type }}</th>
                            <th scope="col">{{ $all->created_at }}</th>
                            <th scope="col">
                                @if ( ($all->status) == 'New' )
                                    <span class="badge badge-dark" style="font-size:100%;">{{ $all->status }}</span>
                                @elseif ( ($all->status) == 'Assigned' )
                                    <span class="badge badge-info" style="font-size:100%;">{{ $all->status }}</span>
                                @elseif ( ($all->status) == 'Cooking' )
                                    <span class="badge badge-warning" style="font-size:100%;">{{ $all->status }}</span>
                                @elseif ( ($all->status) == 'Cooked' )
                                    <span class="badge badge-success" style="font-size:100%;">{{ $all->status }}</span>
                                @elseif ( ($all->status) == 'Pick-up' )
                                    <span class="badge badge-primary" style="font-size:100%;">{{ $all->status }}</span>
                                @elseif ( ($all->status) == 'Cancel' )
                                    <span class="badge badge-danger" style="font-size:100%;">{{ $all->status }}</span>
                                @endif
                            </th>
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
            {{ $everything->links() }}
        </div>
    </div>
</div>