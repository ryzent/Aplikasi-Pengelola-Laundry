<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Outlet;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenOutletController extends Controller
{
    //
    public function index(){
        $toko = Outlet::all();
        return view('pages.toko.index', compact('toko'));
    }

    public function json(Request $request){
        $member = Outlet::all();
        return DataTables::of($member)
        ->addColumn('action', function ($row) {
            $btn = '<a href="manajemen_outlet/'. $row->id .'/edit" class="m-1 edit btn btn-primary btn-sm"><i class="far fa-edit text-white"></i></a>';
            $btn = $btn.'<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt text-white"></i></button>';
            return $btn;
        })->toJson();
    }

    public function create(){
        return view('pages.toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'alamat' => 'required'
        ]);
        Outlet::create($request->all());
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('manajemen_outlet.index');
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
        $toko = Outlet::findOrFail($id);
        return view('pages.toko.edit', compact('toko'));
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
        $toko = Outlet::findOrFail($id);

        $toko->update($data);
        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect()->route('manajemen_outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Outlet::findOrFail($id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        $data->delete();
    }
}
