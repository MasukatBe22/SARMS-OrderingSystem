<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class UpdateSettings extends Component
{
    public $state = [];

    public function mount()
    {
        $setting = Setting::first();

        if ($setting) {
            $this->state = $setting->toArray();
        }
    }

    public function updateSetting()
    {
        $setting = Setting::first();

        if ($setting) {
            $setting->update($this->state);
        } else {
            Setting::create($this->state);
        }
        
        Cache::forget('setting');
        $this->dispatchBrowserEvent('updated', ['message' => 'Settings updated successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.settings.update-settings')->layout('layouts.admin');
    }
}
