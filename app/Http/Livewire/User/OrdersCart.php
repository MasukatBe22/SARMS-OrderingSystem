<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class OrdersCart extends Component
{
    use WithPagination;

    public $quan = '1';
    public $typ = 'pcs';
    public $prods_id;
    protected $listeners = ['refresh-me' => '$refresh'];
    
    public function newCart($prodid)
    {
        $this->prods_id = $prodid;

        $this->dispatchBrowserEvent('show-form');
        $this->emitSelf('refresh-me');
    }

    public function newOrder($prodID)
    {
        $this->prods_id = $prodID;

        $this->dispatchBrowserEvent('show-form');
        $this->emitSelf('refresh-me');
    }

    public function createOrder()
    {
        $validateData = Validator::make([
            'quantity' => $this->quan,
            'type' => $this->typ,
            'status' => 'New',
            'customer_id' => auth()->user()->id,
            'product_id' => $this->prods_id,
        ], [
            'quantity' => 'required',
            'type' => 'required',
            'status' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
        ])->validate();

        Order::create($validateData);
        $this->dispatchBrowserEvent('hide-form', [
            'type' => 'success',
            'title' => 'Order has successfully placed!',
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
        $carts = Cart::where('customer_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(0);
        $product = Cart::with('product')->get();
        $prods = Product::where('status', 'available')->orderBy('id', 'desc')->get();
        return view('livewire.user.orders-cart', ['product' => $product, 'carts' => $carts, 'prods' => $prods, 'orders' => $orders])->layout('layouts.order');
    }
}
