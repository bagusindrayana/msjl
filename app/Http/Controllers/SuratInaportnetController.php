<?php

namespace App\Http\Controllers;

use App\DataTables\SuratInaportnetsDataTable;
use App\Models\SuratInaportnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratInaportnetController extends Controller
{   

    private function bulanRomawi($bulan){
        switch ($bulan) {
            case 1:
                return 'I';
                break;
            case 2:
                return 'II';
                break;
            case 3:
                return 'III';
                break;
            case 4:
                return 'IV';
                break;
            case 5:
                return 'V';
                break;
            case 6:
                return 'VI';
                break;
            case 7:
                return 'VII';
                break;
            case 8:
                return 'VIII';
                break;
            case 9:
                return 'IX';
                break;
            case 10:
                return 'X';
                break;
            case 11:
                return 'XI';
                break;
            case 12:
                return 'XII';
                break;
            default:
                return 'XII';
                break;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SuratInaportnetsDataTable $dataTable)
    {
        return $dataTable->render('admin.surat-inaportnet.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.surat-inaportnet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'klasifikasi_surat'=>'required|max:20',
            'perihal_surat'=>'required|max:100',
            'tanggal_surat'=>'required|date',
            'kepada'=>'required|max:150',
            'nama_kapal'=>'required',
            'gt'=>'required',
            'loa'=>'required',
            'bendera'=>'required',
            'agent'=>'required',
            'pelabuhan_asal'=>'required',
            'pelabuhan_tujuan'=>'required',
            'muatan'=>'required',
            'tanggal'=>'required',
            'no_siup_pbm'=>'required',
        ]);
        //check file_lampiran only image/pdf and max 5 mb
        if($request->has('file_lampiran')){
            $request->validate([
                'file_lampiran'=>'mimes:pdf,images|max:5000'
            ]);
        }

        DB::beginTransaction();

        try {
            $no = "001/RKBM-MSJL/SMD/".$this->bulanRomawi(date('m',strtotime($request->tanggal_surat)))."/".date('Y',strtotime($request->tanggal_surat));
            $lastSurat = SuratInaportnet::latest()->first();
            if ($lastSurat) {
                $lastNo = explode('/',$lastSurat->nomor_surat);
                $no = sprintf("%03d", $lastNo[0]+1)."/RKBM-MSJL/SMD/".$this->bulanRomawi(date('m',strtotime($request->tanggal_surat)))."/".date('Y',strtotime($request->tanggal_surat));
            }

            $file_lampiran = null;
            if($request->has('file_lampiran')){
                $originalName = $request->file('file_lampiran')->getClientOriginalName();
                $ext = $request->file('file_lampiran')->getClientOriginalExtension();
                $slugName = \Str::slug(str_replace($ext,'',$originalName),'-').'-'.time().'.'.$ext;
                $file_lampiran = $request->file('file_lampiran')->storeAs('surat-inaportnet', $slugName,[
                    'disk'=>'public'
                ]);
            }
            $surat = SuratInaportnet::create([
                'user_id'=>auth()->user()->id,
                'nomor_surat'=>$no,
                'klasifikasi_surat'=>$request->klasifikasi_surat,
                'perihal_surat'=>$request->perihal_surat,
                'tanggal_surat'=>$request->tanggal_surat,
                'kepada'=>$request->kepada,
                'nama_kapal'=>$request->nama_kapal,
                'gt'=>$request->gt,
                'loa'=>$request->loa,
                'bendera'=>$request->bendera,
                'agent' => $request->agent,
                'pelabuhan_asal'=>$request->pelabuhan_asal,
                'pelabuhan_tujuan'=>$request->pelabuhan_tujuan,
                'muatan'=>$request->muatan,
                'tanggal'=>$request->tanggal,
                'no_siup_pbm'=>$request->no_siup_pbm,
                'jasa_kapal'=>$request->jasa_kapal,
                'jasa_barang'=>$request->jasa_barang,
                'jasa_labuh'=>$request->jasa_labuh,
                'jasa_pbm'=>$request->jasa_pbm,
                'file_lampiran'=>$file_lampiran
            ]);
            DB::commit();
            return redirect()->route('admin.surat-inaportnet.index')->with('success','Surat berhasil dibuat');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Surat gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratInaportnet $suratInaportnet)
    {
        return view('admin.surat-inaportnet.print',[
            'surat'=>$suratInaportnet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratInaportnet $suratInaportnet)
    {
        return view('admin.surat-inaportnet.edit',[
            'surat'=>$suratInaportnet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratInaportnet $suratInaportnet)
    {
        $request->validate([
            'klasifikasi_surat'=>'required|max:20',
            'perihal_surat'=>'required|max:100',
            'tanggal_surat'=>'required|date',
            'kepada'=>'required|max:150',
            'nama_kapal'=>'required',
            'gt'=>'required',
            'loa'=>'required',
            'bendera'=>'required',
            'agent'=>'required',
            'pelabuhan_asal'=>'required',
            'pelabuhan_tujuan'=>'required',
            'muatan'=>'required',
            'tanggal'=>'required',
            'no_siup_pbm'=>'required',
        ]);
        //check file_lampiran only image/pdf and max 5 mb
        if($request->has('file_lampiran')){
            $request->validate([
                'file_lampiran'=>'mimes:pdf,images|max:5000'
            ]);
        }

        DB::beginTransaction();

        try {
            $lastNo = explode('/',$suratInaportnet->nomor_surat);
            $no = sprintf("%03d", $lastNo[0])."/RKBM-MSJL/SMD/".$this->bulanRomawi(date('m',strtotime($request->tanggal_surat)))."/".date('Y',strtotime($request->tanggal_surat));

            $file_lampiran = $suratInaportnet->file_lampiran;
            if($request->has('file_lampiran')){
                $originalName = $request->file('file_lampiran')->getClientOriginalName();
                $ext = $request->file('file_lampiran')->getClientOriginalExtension();
                $slugName = \Str::slug(str_replace($ext,'',$originalName),'-').'-'.time().'.'.$ext;
                $file_lampiran = $request->file('file_lampiran')->storeAs('surat-inaportnet', $slugName,[
                    'disk'=>'public'
                ]);
            }
            $suratInaportnet->update([
                'nomor_surat'=>$no,
                'klasifikasi_surat'=>$request->klasifikasi_surat,
                'perihal_surat'=>$request->perihal_surat,
                'tanggal_surat'=>$request->tanggal_surat,
                'kepada'=>$request->kepada,
                'nama_kapal'=>$request->nama_kapal,
                'gt'=>$request->gt,
                'loa'=>$request->loa,
                'bendera'=>$request->bendera,
                'agent' => $request->agent,
                'pelabuhan_asal'=>$request->pelabuhan_asal,
                'pelabuhan_tujuan'=>$request->pelabuhan_tujuan,
                'muatan'=>$request->muatan,
                'tanggal'=>$request->tanggal,
                'no_siup_pbm'=>$request->no_siup_pbm,
                'jasa_kapal'=>$request->jasa_kapal,
                'jasa_barang'=>$request->jasa_barang,
                'jasa_labuh'=>$request->jasa_labuh,
                'jasa_pbm'=>$request->jasa_pbm,
                'file_lampiran'=>$file_lampiran
            ]);
            DB::commit();
            return redirect()->route('admin.surat-inaportnet.index')->with('success','Surat berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Surat gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratInaportnet $suratInaportnet)
    {
        $suratInaportnet->delete();
        return redirect()->route('admin.surat-inaportnet.index')->with('success','Surat berhasil dihapus');
    }
}
