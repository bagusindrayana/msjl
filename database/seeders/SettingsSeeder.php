<?php

namespace Database\Seeders;

use App\Helpers\SettingHelper;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = SettingHelper::default();
        foreach ($defaults as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
