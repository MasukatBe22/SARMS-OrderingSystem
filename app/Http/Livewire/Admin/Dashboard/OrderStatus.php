<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;

class OrderStatus extends AdminComponent
{
    public $status = null;
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    public function setStatus1(Order $order)
    {
        Validator::make(['status' => 'Pick-up'], [
            'status' => 'required',
        ]);

        $order->update(['status' => 'Pick-up']);
        $this->dispatchBrowserEvent('updated', ['message' => "Chefs assigned successfully."]);
        $this->emitSelf('refresh-me');
    }

    public function filterOrder($status = null)
    {
        $this->status = $status;
    }

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $customer = Order::with('customer')->get();
        $product = Products::all();
        $orders = Order::when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })->orderBy($this->sortColumnName, $this->sortDirection)->paginate(5);
        $AllOrder = Order::count();
        $newOrder = Order::where('status', 'New')->count();
        $AssignedOrder = Order::where('status', 'Assigned')->count();
        $CookingOrder = Order::where('status', 'Cooking')->count();
        $CookedOrder = Order::where('status', 'Cooked')->count();
        $PickupOrder = Order::where('status', 'Pick-up')->count();
        $CancelOrder = Order::where('status', 'Cancel')->count();
        $everything = Order::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.admin.dashboard.order-status', [
            'orders' => $orders,
            'customer' => $customer,
            'product' => $product,
            'everything' => $everything,
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
