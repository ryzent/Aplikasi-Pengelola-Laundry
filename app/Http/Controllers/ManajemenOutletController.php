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
            $btn = '<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm">Delete</button>';
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
        //
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
        $data = Outlet::findOrFail($id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        $data->delete();
    }
}
