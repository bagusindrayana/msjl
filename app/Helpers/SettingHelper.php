<?php
namespace App\Helpers;

use App\Models\Setting;

class SettingHelper {
    public static function default() {
        $setting = [
            'app_name' => 'PT. MAHAKAM SENTOSA JAYA LESTARI',
            'app_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius lectus sit amet erat tristique mattis. Suspendisse et est fringilla, rutrum ipsum eget, iaculis quam.',
            'app_keywords' => 'Laravel',
            'app_logo' => '/images/logo.png',
            'profile_description' => 'Quisque eget sapien est. Etiam tincidunt dignissim urna a rutrum. Nunc metus risus, tincidunt id orci vitae, porta sodales risus. Vivamus congue nulla a orci pharetra aliquet. Donec nec pulvinar justo. Ut et lorem eu metus eleifend accumsan. Sed ornare erat ultricies nisl commodo congue. Donec id feugiat sem. Ut pulvinar eros sapien. Fusce feugiat eget est vitae mattis. Proin sit amet tincidunt metus. Vestibulum leo leo, porttitor a facilisis et, placerat at diam. Nulla faucibus malesuada odio, et molestie justo vulputate non. Quisque et tortor sit amet tortor vulputate sagittis quis vel eros.',
            'visi'=>"Aenean pellentesque ligula ut sapien condimentum pulvinar. Morbi in posuere sapien. Morbi non sagittis nulla. Nunc sodales neque vitae neque accumsan, id pulvinar lacus pulvinar. Integer consequat ante et enim ornare sodales. Fusce placerat vel nunc quis egestas. Sed lobortis ac ante in faucibus. ",
            'misi'=>"Sed posuere sapien ullamcorper, dictum ex id, dignissim odio. Proin faucibus pharetra cursus. Vivamus nisi neque, mattis a mi nec, congue tincidunt mi. Sed scelerisque ac nunc luctus gravida. Suspendisse malesuada iaculis porta.",
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