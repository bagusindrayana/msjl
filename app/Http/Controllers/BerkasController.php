<?php

namespace App\Http\Controllers;

use App\DataTables\BerkasDataTable;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BerkasDataTable $dataTable)
    {
        return $dataTable->render('admin.berkas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berkas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_berkas' => 'required',
            'asal_berkas' => 'required',
            'perihal' => 'required',
            'tanggal_masuk' => 'required',
            'file_berkas' => 'required|mimes:pdf,image|max:10000'
        ]);

        DB::beginTransaction();
        try {
            $originalName = $request->file('file_berkas')->getClientOriginalName();
            $ext = $request->file('file_berkas')->getClientOriginalExtension();
            $slugName = \Str::slug(str_replace($ext,'',$originalName),'-').'-'.time().'.'.$ext;
            $file_berkas = $request->file_berkas->storeAs('berkas/'.\Str::slug($request->nomor_berkas,$slugName, '-'),[
                'disk'=>'public'
            ]);
            $berkas = Berkas::create([
                'user_id' => auth()->user()->id,
                'nomor_berkas' => $request->nomor_berkas,
                'asal_berkas' => $request->asal_berkas,
                'perihal' => $request->perihal,
                'tanggal_masuk' => $request->tanggal_masuk,
                'keterangan' => $request->keterangan,
                'file_berkas' => $file_berkas
            ]);
            DB::commit();
            return redirect()->route('berkas.index')->with('success', 'Berkas berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error', 'Berkas gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Berkas $berkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berkas $berkas)
    {
        return view('admin.berkas.edit', compact('berkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berkas $berkas)
    {
        $request->validate([
            'nomor_berkas' => 'required',
            'asal_berkas' => 'required',
            'perihal' => 'required',
            'tanggal_masuk' => 'required',
            'file_berkas' => 'nullable|mimes:pdf,image|max:10000'
        ]);

        DB::beginTransaction();
        try {
            $berkas->update([
                'user_id' => auth()->user()->id,
                'nomor_berkas' => $request->nomor_berkas,
                'asal_berkas' => $request->asal_berkas,
                'perihal' => $request->perihal,
                'tanggal_masuk' => $request->tanggal_masuk,
                'keterangan' => $request->keterangan,
            ]);
            if ($request->hasFile('file_berkas')) {
                $originalName = $request->file('file_berkas')->getClientOriginalName();
                $ext = $request->file('file_berkas')->getClientOriginalExtension();
                $slugName = \Str::slug(str_replace($ext,'',$originalName),'-').'-'.time().'.'.$ext;
                $file_berkas = $request->file_berkas->storeAs('berkas/'.\Str::slug($request->nomor_berkas,$slugName, '-'),[
                    'disk'=>'public'
                ]);
                $berkas->update([
                    'file_berkas' => $file_berkas
                ]);
            }
            DB::commit();
            return redirect()->route('berkas.index')->with('success', 'Berkas berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error', 'Berkas gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berkas $berkas)
    {
        DB::beginTransaction();
        try {
            $berkas->delete();
            DB::commit();
            return redirect()->route('berkas.index')->with('success', 'Berkas berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Berkas gagal dihapus');
        }
    }
}
