<?php

use App\NullSetting;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

function setting($key)
{
    $setting = Cache::rememberForever('setting', function () {
        return Setting::first() ?? NullSetting::make();
    });

    if ($setting) {
        return $setting->{$key};
    }
}