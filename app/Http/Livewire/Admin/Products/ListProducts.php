<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;

class ListProducts extends AdminComponent
{
    public $state = [];
    public $productIdBeingRemoved = null;
    public $searchTerm = null;
    public $photo;
    public $status = null;
    public $selectedRows = [];
    public $selectPageRows = false;

    public function edit(int $product_id)
    {
        $this->selectedProductId = $product_id;
        $this->state = Products::findOrFail($product_id)->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateProduct()
    {
        $validateData = Validator::make($this->state, [
            'title'=> 'required',
            'price'=> 'required',
            'description' => 'nullable',
            'status' => 'required',
        ])->validate();

        Products::findOrFail($this->selectedProductId)->update($validateData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Product created successfully']);
    }

    public function confirmProductRemoval($productId)
    {
        $this->productIdBeingRemoved = $productId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteProduct()
    {
        $products = Products::findOrFail($this->productIdBeingRemoved);
        if (!empty($products->photo)){
            Storage::disk('photo')->delete($products->photo);
        }
        $products->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Product deleted successfully!']);
    }

    public function filterProduct($status = null)
    {
        $this->status = $status;
    }

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->products->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getProductsProperty()
    {
        return Products::when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->latest()->paginate(10);
    }

    public function deleteSelectedRows()
    {
        $productArray = Products::whereIn('id', $this->selectedRows);
        $photos = Products::whereIn('id', $this->selectedRows)->pluck('photo');
        foreach ($photos as $photos) {
            if (!empty($photos)){
                Storage::disk('photo')->delete($photos);
            }
        }
        $productArray->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'All selected products got deleted.']);
		$this->reset(['selectPageRows', 'selectedRows']);
    }

    public function markAllAsAvailable()
	{
		Products::whereIn('id', $this->selectedRows)->update(['status' => 'Available']);
		$this->dispatchBrowserEvent('updated', ['message' => 'Productss marked as available']);
		$this->reset(['selectPageRows', 'selectedRows']);
	}

	public function markAllAsUnavailable()
	{
		Products::whereIn('id', $this->selectedRows)->update(['status' => 'Unavailable']);
		$this->dispatchBrowserEvent('updated', ['message' => 'Productss marked as unavailable.']);
		$this->reset(['selectPageRows', 'selectedRows']);
	}

    public function render()
    {
        $products = $this->products;

        $ProductsCount = Products::count();
    	$AvailableProductsCount = Products::where('status', 'Available')->count();
    	$UnavailableProductsCount = Products::where('status', 'Unavailable')->count();
            
        return view('livewire.admin.products.list-products', [
            'products' => $products,
            'ProductsCount' => $ProductsCount,
            'AvailableProductsCount' => $AvailableProductsCount,
            'UnavailableProductsCount' => $UnavailableProductsCount
        ])->layout('layouts.admin');
    }
}
