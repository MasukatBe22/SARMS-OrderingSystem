<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class OrdersCart extends Component
{
    use WithPagination;

    public $quan;
    public $prods_id;
    
    public function newOrder($prodID)
    {
        $this->prods_id = $prodID;

        $this->dispatchBrowserEvent('show-form');
    }

    public function createOrder()
    {
        $validateData = Validator::make([
            'quantity' => $this->quan,
            'status' => 'New',
            'customer_id' => auth()->user()->id,
            'product_id' => $this->prods_id,
        ], [
            'quantity' => 'required',
            'status' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
        ])->validate();

        Order::create($validateData);
        $this->dispatchBrowserEvent('hide-form', [
            'type' => 'success',
            'title' => 'Order has been cancel!',
            'text' => ''
        ]);
    }

    public function cancelOrder($orderID)
    {
        $order = Order::findOrFail($orderID);
        Validator::make(['status' => 'Cancel'], [
            'status' => 'required',
        ]);

        $order->update(['status' => 'Cancel']);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Order has been cancel!',
            'text' => ''
        ]);
    }

    public function removeCart($ordID)
    {
        $cart = Cart::findOrFail($ordID);
        $cart->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Successfully remove!',
            'text' => ''
        ]);
    }

    public function render()
    {
        $orders = Order::where('customer_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(0);
        $carts = Cart::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(0);
        $product = Cart::with('product')->get();
        $prods = Products::where('status', 'available')->orderBy('id', 'desc')->get();
        return view('livewire.user.orders-cart', ['product' => $product, 'carts' => $carts, 'prods' => $prods, 'orders' => $orders])->layout('layouts.order');
    }
}
