<?php

namespace App\Http\Livewire\Chef\Dashboard;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Chef\ChefComponent;
use Illuminate\Support\Facades\Validator;

class ChefDashboard extends ChefComponent
{
    public $status = 'Cancel';
    public $sortColumnName = 'created_at';
    public $sortDirection = 'asc';
    protected $listeners = ['refresh-me' => '$refresh'];

    public function setStatus1(Order $order)
    {
        Validator::make(['status' => 'Cooking'], [
            'status' => 'required',
        ]);

        $order->update(['status' => 'Cooking']);
        $this->dispatchBrowserEvent('updated', ['message' => "Chefs assigned successfully."]);
        $this->emitSelf('refresh-me');
    }

    public function setStatus2(Order $order)
    {
        Validator::make(['status' => 'Cooked'], [
            'status' => 'required',
        ]);

        $order->update(['status' => 'Cooked']);
        $this->dispatchBrowserEvent('updated', ['message' => "Chefs assigned successfully."]);
        $this->emitSelf('refresh-me');
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

    public function filterOrder($status = null)
    {
        $this->status = $status;
    }

    public function render()
    {
        $customer = Order::with('customer')->get();
        $product = Products::all(); 
        $orders = Order::query()
            ->whereIn('status', ['Assigned', 'Cooking', 'Cooked'])
            ->where('chef_id', Auth::user()->id)
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->whereDay('created_at', Carbon::today('America/Chicago'))
            ->paginate(10);
        $today = Order::when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })->where('chef_id', Auth::user()->id)->whereDay('created_at', Carbon::today('America/Chicago'))->orderBy('created_at', 'desc')->paginate(5);
        $PickupOrder = Order::where('status', 'Pick-up')->where('chef_id', Auth::user()->id)->count();
        $CancelOrder = Order::where('status', 'Cancel')->where('chef_id', Auth::user()->id)->count();

        return view('livewire.chef.dashboard.chef-dashboard', [
            'orders' => $orders,
            'customer' => $customer,
            'product' => $product,
            'today' => $today,
            'PickupOrder' => $PickupOrder,
            'CancelOrder' => $CancelOrder,
        ])->layout('layouts.chef');
    }
}