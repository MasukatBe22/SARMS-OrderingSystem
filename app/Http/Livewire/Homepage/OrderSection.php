<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Order;
use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class OrderSection extends Component
{
    use WithPagination;
    
    public function render()
    {
        $orders = Order::query()
            ->whereIn('status', ['Assigned', 'Cooking', 'Cooked'])
            ->where('customer_id', auth()->user()->id)
            ->whereDay('created_at', Carbon::today('America/Chicago'))
            ->orderBy('created_at', 'asc')->paginate(0);
        $chef = Order::with('chef')->get();
        $product = Products::all();
        return view('livewire.homepage.order-section', ['chef' => $chef, 'orders' => $orders, 'product' => $product]);
    }
}
