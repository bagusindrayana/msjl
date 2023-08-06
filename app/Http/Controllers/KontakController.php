<?php

namespace App\Http\Controllers;

use App\DataTables\KontaksDataTable;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    function index(KontaksDataTable $dataTable) {
        return $dataTable->render('admin.kontak.index');
    }

    function create() {
        return view('admin.kontak.create');
    }

    function store(Request $request) {
        $request->validate([
            'tipe' => 'required',
            'kontak' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $kontak = Kontak::create([
                'tipe' => $request->tipe,
                'kontak' => $request->kontak,
            ]);
            DB::commit();
            return redirect()->route('admin.kontak.index')->with('success','Kontak berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Kontak gagal ditambahkan');
        }
    }

    function edit($id) {
        $kontak = Kontak::find($id);
        return view('admin.kontak.edit',compact('kontak'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'tipe' => 'required',
            'kontak' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $kontak = Kontak::find($id);
            $kontak->update([
                'tipe' => $request->tipe,
                'kontak' => $request->kontak,
            ]);
            DB::commit();
            return redirect()->route('admin.kontak.index')->with('success','Kontak berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Kontak gagal diubah');
        }
    }

    function destroy($id) {
        DB::beginTransaction();
        try {
            $kontak = Kontak::find($id);
            $kontak->delete();
            DB::commit();
            return redirect()->route('admin.kontak.index')->with('success','Kontak berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Kontak gagal dihapus');
        }
    }
    
}
