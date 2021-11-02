<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Outlet;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenProdukController extends Controller
{
    //
    public function index(){
        $toko = Outlet::all();
        $produk = Produk::all();

        return view('pages.produk.index',[
            'produks' => $produk,
            'toko' => $toko
        ]);
    }

    public function json(Request $request){
        if ($request->ajax()) {
            $member = Produk::select('*');
            return DataTables::of($member->with('toko'))
            ->addColumn('action', function ($row) {
                $btn = '<a href="manajemen_produk/'. $row->id .'/edit" class="m-1 edit btn btn-primary btn-sm"><i class="far fa-edit text-white"></i></a>';
                $btn = $btn.'<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt text-white"></i></button>';
                return $btn;
            })->toJson();
        }

    }

    public function create(){
        $toko = Outlet::all();
        $produk = Produk::all();
        return view('pages.produk.create',[
            'produk' => $produk,
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
        $request->validate([
            'id_outlet'=>'required',
            'nama_paket' => 'required'
        ]);
        Produk::create($request->all());
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('manajemen_produk.index');
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
        $produk = Produk::findOrFail($id);
        $toko = Outlet::all();
        return view('pages.produk.edit', [
            'produk' => $produk,
            'toko' => $toko
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
        $produk = Produk::findOrFail($id);

        $produk->update($data);
        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect()->route('manajemen_produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        $data->delete();
    }
}
