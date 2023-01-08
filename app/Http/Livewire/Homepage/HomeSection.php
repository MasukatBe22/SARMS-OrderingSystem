<?php

namespace App\Http\Livewire\Homepage;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;

class HomeSection extends Component
{
    use WithPagination;
    
    public function render()
    {
        $pro = Products::select('photo')->where('status', 'available')->orderBy('id', 'desc')->first();
             
        $products = Products::where('status', 'available')->orderBy('id', 'desc')->paginate(8);
        return view('livewire.homepage.home-section', ['products' => $products, 'pro' => $pro]);
    }
}
