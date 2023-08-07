<?php

namespace App\Http\Controllers;

use App\Helpers\SettingHelper;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontenController extends Controller
{
    function profil() {
        $setting = (object)Setting::pluck('value','key')->toArray();
        return view('admin.konten.profil',compact('setting'));
    }

    function profilUpdate(Request $request) {
        $request->validate([
            'app_name' => 'required',
            'app_description' => 'required',
            'profile_description' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'app_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'visi_misi_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $setting = [
                'app_name' => $request->app_name,
                'app_description' => $request->app_description,
                'profile_description' => $request->profile_description,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'app_logo' => SettingHelper::get('app_logo'),
                'banner_image' => SettingHelper::get('banner_image'),
                'visi_misi_image' => SettingHelper::get('visi_misi_image'),
                'alamat' => $request->alamat,
            ];
            if ($request->hasFile('app_logo')) {
                $setting['app_logo'] = $request->file('app_logo')->store('images',[
                    'disk' => 'public'
                ]);
            }
            if ($request->hasFile('banner_image')) {
                $setting['banner_image'] = $request->file('banner_image')->store('images',[
                    'disk' => 'public'
                ]);
            }
            if ($request->hasFile('visi_misi_image')) {
                $setting['visi_misi_image'] = $request->file('visi_misi_image')->store('images',[
                    'disk' => 'public'
                ]);
            }

            foreach ($setting as $key => $value) {
                Setting::updateOrCreate([
                    'key' => $key
                ],[
                    'value' => $value
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success','Berhasil mengubah data');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal mengubah data');
        }
    }

    function strukturOrganisasi() {
        $strukturJson = SettingHelper::get('struktur_organisasi');
        if($strukturJson == null){
            $strukturJson = '{ 
                "class": "go.TreeModel",
                "nodeDataArray": [
                    {"key":1, "name":"Mahmudin,SE", "title":"CEO"},
                    {"key":2, "name":"Lutfi", "title":"Programmer", "parent":1},
                    {"key":3, "name":"Akmal", "title":"UI/UX Desain", "parent":1}
                ]
            }';
        }
        return view('admin.konten.struktur-organisasi',compact('strukturJson'));
    }

    function strukturOrganisasiUpdate(Request $request) {
        $request->validate([
            'struktur_organisasi' => 'required',
            
        ]);
        $json = $request->struktur_organisasi;
        
        //check if valid json and remove all html tag
        $json = filter_var($json, FILTER_SANITIZE_STRING);

        //check if valid json
        

        DB::beginTransaction();
        try {
            $json = json_decode($json);
            if($json == null){
                return redirect()->back()->withInput($request->all())->with('error','Gagal mengubah data, pastikan struktur organisasi berupa json');
            }
            Setting::updateOrCreate([
                'key' => "struktur_organisasi"
            ],[
                'value' => $json
            ]);

            DB::commit();
            return redirect()->back()->with('success','Berhasil mengubah data');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal mengubah data');
        }
    }
}
