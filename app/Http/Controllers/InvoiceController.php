<?php

namespace App\Http\Controllers;

use App\DataTables\InvoicesDataTable;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
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
    public function index(InvoicesDataTable $dataTable)
    {
        return $dataTable->render('admin.invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $customers = Customer::all();
        return view('admin.invoice.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'tanggal_invoice' => 'required',
            'file_invoice' => 'nullable|mimes:pdf,images|max:5000',
            'deskripsi_detail' => 'required|array',
        ],[
            'deskripsi_detail.required' => 'Deskripsi detail tidak boleh kosong',
            'deskripsi_detail.array' => 'Harus memiliki minimal 1 detail',
        ]);
        DB::beginTransaction();
        try {
            $no = "001/MSJL-INV/SMD/".$this->bulanRomawi(date('m'))."/".date('Y');
            $lastInvoice = Invoice::latest()->first();
            if ($lastInvoice) {
                $lastNo = explode('/',$lastInvoice->nomor_invoice);
                $no = sprintf("%03d", $lastNo[0]+1)."/MSJL-INV/SMD/".$this->bulanRomawi(date('m'))."/".date('Y');
            }
            $file_invoice = null;
            if ($request->hasFile('file_invoice')) {
                $file_invoice = $request->file('file_invoice')->store('invoice',[
                    'disk' => 'public'
                ]);
            }
            $invoice = Invoice::create([
                'customer_id' => $request->customer_id,
                'user_id' => auth()->user()->id,
                'nomor_invoice' => $no,
                'tanggal_invoice' => $request->tanggal_invoice,
                'jumlah_invoice' => 0,
                'keterangan_invoice' => $request->keterangan_invoice,
                'file_invoice'=>$file_invoice
            ]);

            $jumlah = 0;
            foreach ($request->deskripsi_detail as $key => $deskripsi_detail) {
                $invoice->invoice_details()->create([
                    'deskripsi' => $deskripsi_detail,
                    'tanggal' => $request->periode_detail[$key],
                    'jumlah' => $request->jumlah_detail[$key],
                    
                ]);
                $jumlah += $request->jumlah_detail[$key];
            }
            $invoice->update([
                'jumlah_invoice' => $jumlah
            ]);
            DB::commit();
            return redirect()->route('admin.invoice.index')->with('success','Invoice berhasil dibuat');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Invoice gagal dibuat : '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoice.print',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        return view('admin.invoice.edit',compact('customers','invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required',
            'tanggal_invoice' => 'required',
            'file_invoice' => 'nullable|mimes:pdf,images|max:5000',
            'deskripsi_detail' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $file_invoice = null;
            if ($request->hasFile('file_invoice')) {
                $file_invoice = $request->file('file_invoice')->store('invoice',[
                    'disk' => 'public'
                ]);
            }
            $no = $invoice->nomor_invoice;
            $lastNo = explode('/',$no);
            $no = $lastNo[0]."/MSJL-INV/SMD/".$this->bulanRomawi(date('m'))."/".date('Y');
            $invoice->update([
                'customer_id' => $request->customer_id,
                'user_id' => auth()->user()->id,
                'nomor_invoice' => $no,
                'tanggal_invoice' => $request->tanggal_invoice,
                'jumlah_invoice' => 0,
                'keterangan_invoice' => $request->keterangan_invoice,
                'file_invoice'=>$file_invoice
            ]);

            $jumlah = 0;
            $invoice->invoice_details()->delete();
            foreach ($request->deskripsi_detail as $key => $deskripsi_detail) {
                $invoice->invoice_details()->create([
                    'deskripsi' => $deskripsi_detail,
                    'tanggal' => $request->periode_detail[$key],
                    'jumlah' => $request->jumlah_detail[$key],
                    
                ]);
                $jumlah += $request->jumlah_detail[$key];
            }
            $invoice->update([
                'jumlah_invoice' => $jumlah
            ]);
            DB::commit();
            return redirect()->route('admin.invoice.index')->with('success','Invoice berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Invoice gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {   
        DB::beginTransaction();
        try {
            $invoice->invoice_details()->delete();
            $invoice->delete();
            DB::commit();
            return redirect()->route('admin.invoice.index')->with('success','Invoice berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Invoice gagal dihapus');
        }
    }
}
