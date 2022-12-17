<?php

namespace App\Http\Livewire\Chef\Dashboard;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Chef\ChefComponent;
use Illuminate\Support\Facades\Validator;

class ChefDashboard extends ChefComponent
{
    public $status = 'Assigned';
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

    public function render()
    {
        $customer = Order::with('customer')->get();
        $product = Products::all();
        $orders = Order::where('chef_id', Auth::user()->id)->latest()->paginate(10);

        return view('livewire.chef.dashboard.chef-dashboard', ['orders' => $orders, 'customer' => $customer, 'product' => $product])->layout('layouts.chef');
    }
}