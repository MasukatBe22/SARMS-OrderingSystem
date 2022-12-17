<?php

namespace App\Http\Livewire\Chef\Profile;

use App\Models\Chef;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Chef\ChefComponent;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ChefBio extends ChefComponent
{
    use WithFileUploads;
    
    public $image;
    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->only(['name', 'email', 'address', 'mobile', 'bio']);
    }

    public function updatedImage()
    {
        $previousPath = auth()->user()->avatar;
        $path = $this->image->store('/', 'avatars');
        Auth::user()->update(['avatar' => $path]);
        if (!empty($previousPath)){
            Storage::disk('avatars')->delete($previousPath);
        }
        $this->dispatchBrowserEvent('updated', ['message' => 'Profile changed successfully!']);
    }

    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email']
        ]);

        $this->emit('nameChanged', auth()->user()->name);
        $this->dispatchBrowserEvent('updated', ['message' => 'Profile updated successfully!']);
    }

    public function updateInfo()
    {
        $validateData = Validator::make($this->state, [
            'address' => 'required',
            'mobile' => 'required',
            'bio' => 'sometimes|nullable'
        ])->validate();

        Auth::user()->update($validateData);
        $this->dispatchBrowserEvent('updated', ['message' => 'Profile updated successfully!']);
    }

    public function render() 
    {
        return view('livewire.chef.profile.chef-bio')->layout('layouts.chef');
    }
}