<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\Products;
use App\Http\Livewire\Admin\AdminComponent;

class OrderStatus extends AdminComponent
{
    public $status = null;

    public function filterOrder($status = null)
    {
        $this->status = $status;
    }

    public function render()
    {
        $chef = Order::with('chef')->get();
        $customer = Order::with('customer')->get();
        $product = Products::all();
        $orders = Order::when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })->orderBy('id', 'desc')->paginate(5);
        $AllOrder = Order::count();
        $newOrder = Order::where('status', 'New')->count();
        $AssignedOrder = Order::where('status', 'Assigned')->count();
        $CookingOrder = Order::where('status', 'Cooking')->count();
        $CookedOrder = Order::where('status', 'Cooked')->count();
        $PickupOrder = Order::where('status', 'Pick-up')->count();
        $CancelOrder = Order::where('status', 'Cancel')->count();
        return view('livewire.admin.dashboard.order-status', [
            'orders' => $orders,
            'customer' => $customer,
            'chef' => $chef,
            'product' => $product,
            'AllOrder' => $AllOrder,
            'newOrder' => $newOrder,
            'AssignedOrder' => $AssignedOrder,
            'CookingOrder' => $CookingOrder,
            'CookedOrder' => $CookedOrder,
            'PickupOrder' => $PickupOrder,
            'CancelOrder' => $CancelOrder,
        ]);
    }
}
