<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;

class ListUsers extends AdminComponent
{
    public $state = [];
    public $user;
    public $showEditModal = false;
    public $userIdBeingRemoved = null;
    public $searchTerm = null;
    
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function changeRole(User $user, $role)
    {
        Validator::make(['role' => $role], [
            'role' => ['required', Rule::in(User::ROLE_ADMIN, User::ROLE_CHEF, User::ROLE_USER)],
            'role' => 'required|in:admin,chef,user',
        ]);

        $user->update(['role' => $role]);
        $this->dispatchBrowserEvent('updated', ['message' => "Role changed to {$role} successfully."]);
    }

    public function addNew()
    {
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);
    }

    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();
        
        if (!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
    }

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orwhere('email', 'like', '%'.$this->searchTerm.'%')
            ->orwhere('created_at', 'like', '%'.$this->searchTerm.'%')
            ->latest()->paginate(10);
        return view('livewire.admin.users.list-users', [
        'users' => $users])->layout('layouts.admin');
    }
}

