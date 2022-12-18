<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use Livewire\Component;

class OrderCount extends Component
{
    public $orderCount;

    public function mount()
    {
        $this->getOrderCount();
    }

    public function getOrderCount($status = null)
    {
        $this->orderCount = Order::query()
            ->when($status, function ($query, $status){
                return $query->where('status', $status);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.order-count');
    }
}
