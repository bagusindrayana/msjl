<?php

namespace App\Http\Controllers;

use App\DataTables\CustomersDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomersDataTable $dataTable)
    {
        return $dataTable->render('admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $customer = Customer::create([
                'nama_customer' => $request->nama_customer,
                'no_telp_customer' => $request->no_telp_customer,
                'email_customer' => $request->email_customer,
                'alamat_customer' => $request->alamat_customer,
            ]);
            DB::commit();
            return redirect()->route('admin.customer.index')->with('success','Customer berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Customer gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama_customer' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $customer->update([
                'nama_customer' => $request->nama_customer,
                'no_telp_customer' => $request->no_telp_customer,
                'email_customer' => $request->email_customer,
                'alamat_customer' => $request->alamat_customer,
            ]);
            DB::commit();
            return redirect()->route('admin.customer.index')->with('success','Customer berhasil diubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error','Customer gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        DB::beginTransaction();
        try {
            $customer->delete();
            DB::commit();
            return redirect()->route('admin.customer.index')->with('success','Customer berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error','Customer gagal dihapus');
        }
    }
}
