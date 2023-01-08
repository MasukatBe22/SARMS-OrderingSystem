<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class AccountSettings extends Component
{
    use WithFileUploads;
    
    public $image;
    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->only(['name', 'email', 'address', 'mobile', 'bio']);
    }

    public function updateProfile()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'bio' => 'sometimes|nullable'
        ])->validate();

        Auth::user()->update($validateData);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Profile changed successfully!',
            'text' => ''
        ]);
    }

    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(
            auth()->user(),
            $attributes = Arr::only($this->state, ['current_password', 'password', 'password_confirmation'])
        );

        collect($attributes)->map(fn ($value, $key) => $this->state[$key] = '');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Password changed successfully!',
            'text' => ''
        ]);
    }

    public function updatedImage()
    {
        $previousPath = auth()->user()->avatar;
        $path = $this->image->store('/', 'avatars');
        Auth::user()->update(['avatar' => $path]);
        if (!empty($previousPath)){
            Storage::disk('avatars')->delete($previousPath);
        }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Profile avatar changed successfully!',
            'text' => ''
        ]);
    }
    
    public function render()
    {
        return view('livewire.user.account-settings')->layout('layouts.user');
    }
}
