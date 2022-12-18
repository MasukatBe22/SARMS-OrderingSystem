<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class CustomerCount extends Component
{
    public $customerCount;

    public function mount()
    {
        $this->customerCount = User::where('role', 'user')->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.customer-count');
    }
}
