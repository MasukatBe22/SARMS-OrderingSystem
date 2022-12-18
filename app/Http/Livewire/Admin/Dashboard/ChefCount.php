<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class ChefCount extends Component
{
    public $chefCount;

    public function mount()
    {
        $this->chefCount = User::where('role', 'chef')->count();
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard.chef-count');
    }
}
