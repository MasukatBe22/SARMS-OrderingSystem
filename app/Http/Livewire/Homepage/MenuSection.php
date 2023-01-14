<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class MenuSection extends Component
{
    public function addtoCart(int $productId)
    {
        if(Cart::where('customer_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
            $cart = Cart::where('product_id', $productId);
            $cart->delete();
        }
        else {
            Validator::make(['customer_id' => auth()->user()->id, 'product_id' => $productId], [
                'customer_id' => 'required',
                'product_id' => 'required',
            ]);
            Cart::create(['customer_id' => auth()->user()->id, 'product_id' => $productId]);
        }
    }

    public function render()
    {
        $products = Product::where('status', 'available')->orderBy('id', 'desc')->get();
        return view('livewire.homepage.menu-section', ['products' => $products]);
    }
}
