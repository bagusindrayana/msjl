<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    function create() {
        return view('admin.user.create');
    }

    function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5:max:20|unique:users',
            'password' => 'required|min:5|max:50',
            'role' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->role
            ]);
            DB::commit();
            return redirect()->route('admin.user.index')->with('success','Berhasil menambahkan data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal menambahkan data');
        }
    }


    function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.create',compact('user'));
    }

    function update($id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5:max:20|unique:users,username,'.$id,
            'password' => 'nullable|min:5|max:50',
            'role' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'role' => $request->role
            ]);
            DB::commit();
            return redirect()->route('admin.user.index')->with('success','Berhasil mengubah data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error','Gagal mengubah data');
        }
    }

    function destroy($id) {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
            return redirect()->route('admin.user.index')->with('success','Berhasil menghapus data');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Gagal menghapus data');
        }
    }
}
