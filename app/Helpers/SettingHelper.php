<?php
namespace App\Helpers;

use App\Models\Setting;

class SettingHelper {
    public static function default() {
        $setting = [
            'app_name' => 'Laravel',
            'app_description' => 'Laravel',
            'app_keywords' => 'Laravel',
            'app_logo' => 'logo.png',
            'profile_description' => 'Laravel',
            'visi'=>null,
            'misi'=>null,
            'gambar_struktur_organisasi'=>null
        ];
        return $setting;
    }

    public static function get($key) {
        $setting = Setting::where('key', $key)->first();
        if ($setting) {
            return $setting->value;
        }
        return null;
    }
}