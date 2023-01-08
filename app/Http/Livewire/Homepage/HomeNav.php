<?php

namespace App\Http\Livewire\Homepage;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomeNav extends Component
{
    public function render()
    {
        $Count = Cart::where('user_id',  Auth::user()->id)->count();
        return view('livewire.homepage.home-nav', ['Count' => $Count]);
    }
}
