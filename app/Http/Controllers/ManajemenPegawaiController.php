<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
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
        $member = User::all();
        return DataTables::of($member)
        ->addColumn('action', function ($row) {
            $btn = '<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm">Delete</button>';
            $btn = $btn.'<a href="manajemen_pegawai/'. $row->id .'/edit" class="m-1 edit btn btn-primary btn-sm">Edit</a>';
            return $btn;
        })->toJson();
    }

    public function create(){
        $toko = Outlet::all();
        return view('pages.pegawai.create',[
            'toko' => $toko
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
        //
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
        return view('pages.pegawai.edit',[
            'toko' => $toko,
            'user' => $user
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
        //
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
