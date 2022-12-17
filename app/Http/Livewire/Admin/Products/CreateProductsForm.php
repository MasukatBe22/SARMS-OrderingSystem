<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class CreateProductsForm extends Component
{
    use WithFileUploads;

    public $photo;

    public $state = [
        'status' => 'Available',
    ];

    public function createProduct()
    {
        $validateData = Validator::make($this->state, [
            'title' => 'required',
            'price'=> 'required',
            'description' => 'nullable',
            'status' => 'required',
        ])->validate();

        if ($this->photo) {
            $validateData['photo'] = $this->photo->store('/', 'photo');
        }
        Products::create($validateData); 
        
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Product created successfully']);
        $this->state = [
            'status' => 'Available',
        ];
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.admin.products.create-products-form')->layout('layouts.admin');
    }
}
