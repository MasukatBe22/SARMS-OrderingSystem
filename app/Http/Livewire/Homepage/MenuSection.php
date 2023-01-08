<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class MenuSection extends Component
{
    public function addtoCart(int $productId)
    {
        if(Cart::where('user_id', auth()->user()->id)->where('prod_id', $productId)->exists()) {
            $cart = Cart::where('prod_id', $productId);
            $cart->delete();
        }
        else {
            Validator::make(['user_id' => auth()->user()->id, 'prod_id' => $productId], [
                'user_id' => 'required',
                'prod_id' => 'required',
            ]);
            Cart::create(['user_id' => auth()->user()->id, 'prod_id' => $productId]);
        }
    }

    public function render()
    {
        $products = Products::where('status', 'available')->orderBy('id', 'desc')->get();
        return view('livewire.homepage.menu-section', ['products' => $products]);
    }
}
