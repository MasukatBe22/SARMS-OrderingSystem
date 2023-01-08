<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Order;
use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;

class OrderSection extends Component
{
    use WithPagination;
    
    public function render()
    {
        $orders = Order::where('status', 'Cooking')->orderBy('updated_at', 'asc')->paginate(0);
        $customer = Order::with('customer')->get();
        $product = Products::all();
        return view('livewire.homepage.order-section', ['customer' => $customer, 'orders' => $orders, 'product' => $product]);
    }
}
