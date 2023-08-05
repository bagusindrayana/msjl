<?php

namespace App\Http\Controllers;

use App\DataTables\LayanansDataTable;
use App\Models\Layanan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    public function index(LayanansDataTable $dataTable)
    {
        return $dataTable->render('admin.layanan.index');
    }

    function create() {
        return view('admin.layanan.create');
    }

    function store(Request $request) {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'gambar_layanan' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $gambar_layanan = $request->file('gambar_layanan')->store('images/layanan',[
                'disk' => 'public'
            ]);
            $layanan = Layanan::create([
                'slug'=> \Str::slug($request->nama_layanan),
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'gambar_layanan' => $gambar_layanan,
            ]);
            DB::commit();
            return redirect()->route('admin.layanan.index')->with('success','Berhasil menambahkan data');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal menambahkan data : '.$th->getMessage());
        }
    }

    function edit($id) {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit',compact('layanan'));
    }

    function update($id,Request $request) {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'gambar_layanan' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $layanan = Layanan::findOrFail($id);
        DB::beginTransaction();
        try {
            $gambar_layanan = $layanan->gambar_layanan;
            if($request->hasFile('gambar_layanan')){
                $gambar_layanan = $request->file('gambar_layanan')->store('images/layanan',[
                    'disk' => 'public'
                ]);
            }
            $layanan->update([
                'slug'=> \Str::slug($request->nama_layanan),
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'gambar_layanan' => $gambar_layanan,
            ]);
            DB::commit();
            return redirect()->route('admin.layanan.index')->with('success','Berhasil menambahkan data');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal menambahkan data : '.$th->getMessage());
        }
    }

    function destroy($id) {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success','Berhasil menghapus data');
    }

    public function updateGambar(Request $request) {
        $request->validate([
            'layanan_jasa_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        //update setting key layanan_jasa_image
        $layanan_jasa_image = $request->file('layanan_jasa_image')->store('images/layanan',[
            'disk' => 'public'
        ]);
        Setting::where('key','layanan_jasa_image')->update([
            'value' => $layanan_jasa_image
        ]);
        return redirect()->back()->with('success','Berhasil mengubah gambar');
    }
}
