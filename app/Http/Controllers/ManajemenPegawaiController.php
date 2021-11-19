<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenPegawaiController extends Controller
{
    //
    public function index(){
        $toko = Outlet::all();
        $user = User::all();
        return view('pages.pegawai.index',[
            'toko' => $toko,
            'pegawai' => $user
        ]);
    }

    public function json(Request $request){
        if ($request->ajax()) {
            $member = User::select('*');
            return DataTables::of($member->with('toko', 'role'))
            ->addColumn('action', function ($row) {
                $btn = '<a id="detail_pegawai" data-bs-toggle="modal" data-bs-target="#pegawai_modal" data-attr="'.route('manajemen_pegawai.show', $row->id).'"class="m-1 edit btn btn-primary btn-sm"><i class="far fa-eye text-white"></i></a>';
                $btn = $btn.'<a href="manajemen_pegawai/'. $row->id .'/edit" class="m-1 edit btn btn-success btn-sm"><i class="far fa-edit text-white"></i></a>';
                $btn = $btn.'<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt text-white"></i></button>';
                return $btn;
            })->toJson();
        }
    }

    public function create(){
        $toko = Outlet::all();
        $role = Role::all();
        return view('pages.pegawai.create',[
            'toko' => $toko,
            'role' => $role
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
       $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => 'required',
        'id_outlet' => 'required'
        ]);
        $password = request('password');
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
            'id_outlet' => $request['id_outlet'],
        ]);
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('manajemen_pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::with('toko', 'role')->findOrFail($id);
        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toko = Outlet::all();
        $user = User::findOrFail($id);
        $role = Role::all();
        return view('pages.pegawai.edit',[
            'toko' => $toko,
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $password = request('password');
        $data['password'] = Hash::make($password);
        $users = User::findOrFail($id);

        $users->update($data);
        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect()->route('manajemen_pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        $data->delete();
    }
}
