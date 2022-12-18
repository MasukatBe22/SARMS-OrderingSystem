<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Products;

class ProductCount extends Component
{
    public $productCount;

    public function mount()
    {
        $this->getproductCount();
    }

    public function getproductCount($status = null)
    {
        $this->productCount = Products::query()
            ->when($status, function ($query, $status){
                return $query->where('status', $status);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.product-count');
    }
}
