<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Status;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    //
    public function index(){
        $invoice = mt_rand(1000000,9999999);
        $invoice = 'INV'.$invoice;
        $produk = Produk::all();
        return view('pages.transaksi.index',[
            'invoices' => $invoice,
            'produk' => $produk
        ]);
    }

    public function json(Request $request){
        // if ($request->ajax()) {
            $member = Transaksi::select('*');
            return DataTables::of($member->with('status'))
            ->addColumn('action', function ($row) {
                $btn = '<a id="detail_pegawai" data-bs-toggle="modal" data-bs-target="#pegawai_modal" data-attr="'.route('manajemen_pegawai.show', $row->id).'"class="m-1 edit btn btn-primary btn-sm"><i class="far fa-eye text-white"></i></a>';
                $btn = $btn.'<a href="manajemen_pegawai/'. $row->id .'/edit" class="m-1 edit btn btn-success btn-sm"><i class="far fa-edit text-white"></i></a>';
                $btn = $btn.'<button type="button" name="delete" id="'.$row->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt text-white"></i></button>';
                return $btn;
            })->toJson();

    }

    public function create(Request $request){
        $invoice = mt_rand(1000000,9999999);
        $invoice = 'INV'.$invoice;
        $produk = Produk::all();

        // if($request->session()->has('transaksi') && $request->session()->has('kode_invoice')){
        //     $transaksi = $request->session()->get('transaksi');
        //     $invoices = $request->session()->get('kode_invoice');
        //     $nama = $request->session()->get('nama');
        //     return view('pages.transaksi.create', compact('produk', 'transaksi', 'invoices', 'nama'));
        // }
        return view('pages.transaksi.create',[
            'invoices' => $invoice,
            'produk' => $produk

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $kode_invoice = $request->input('kode_invoice');
        $id_barang = $request->input('barang');
        $banyak = $request->input('jumlah');
        $harga = Produk::where('id', $id_barang)->get('harga');
        $total = intval($harga[0]['harga']) * $banyak;

        $data = $request->all();
        DetailTransaksi::create([
            'kode_invoice' => $kode_invoice,
            'id_paket'=> $id_barang,
            'banyak' => $banyak,
            'harga' => $harga[0]['harga'],
            'total' => $total
        ]);

        Transaksi::create([
            'id_outlet' => Auth::user()->id_outlet,
            'kode_invoice' => $data['kode_invoice'],
            'nama' => $data['nama'],
            'tgl_masuk' => $data['tgl_masuk'],
            'id_status' => '1',
            'id_user' => Auth::user()->id,
        ]);
        Alert::success('Berhasil','Data berhasil ditambahkan');
        return redirect()->route('transaksi.index');


     }

    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     DetailTransaksi::created([
    //         'kode_invoice' => $data['kode_invoice'],
    //         'id_paket',
    //         'banyak',
    //         'harga',
    //         'total'
    //     ]);
    //     // Transaksi::create();
    //     return redirect('/manajemen_outlet')->with('status','data berhasil ditambahkan');
    // }

    // public function storeTransaksi(Request $request){
    //     $nama = $request->input('nama');
    //     $banyak = $request->input('jumlah');
    //     $kode_invoice = $request->input('kode_invoice');
    //     $id_barang = $request->input('barang');
    //     $harga = Produk::where('id', $id_barang)->get('harga');
    //     $nama_barang = Produk::where('id', $id_barang)->get('nama_paket');
    //     $satuan = $request->input('satuan');

    //     $banyaknya = $banyak.' '.$satuan;
    //     $total = intval($harga[0]['harga']) * $banyak;

    //     $row_id = md5($kode_invoice . serialize($id_barang));

    //     $data = [
    //         'data' => [
    //             'id_barang' => $id_barang,
    //             'barang' => $nama_barang[0]['nama_paket'],
    //             'banyak'=> $banyak,
    //             'harga' => $harga[0]['harga'],
    //             'row_id' => $row_id
    //         ]
    //     ];

    //     // return response()->json($data);

    //     if(!$request->session()->has('transaksi') && !$request->session()->has('kode_invoice')){
    //         $request->session()->put('transaksi', $data);
    //         $request->session()->put('kode_invoice', $kode_invoice);
    //         $request->session()->put('nama', $nama);
    //     } else{
    //         $exist = 0;
    //         $transaksi = $request->session()->get('transaksi');

    //         // return response()->json($transaksi['data']);

    //         foreach($transaksi as $tr => $value){
    //             if($transaksi[$tr]['id_barang'] == $id_barang){
    //                 $transaksi[$tr]['banyak'] += $banyak;
    //                 $transaksi[$tr]['harga'] += $harga;
    //                 $exist++;
    //             }

    //         }

    //         if ($exist == 0) {
    //             $newtransaksi = array_merge_recursive($transaksi, $data);
    //             $request->session()->put('transaksi', $newtransaksi);
    //         } else {
    //             $request->session()->put('transaksi', $transaksi);
    //         }

    //         // foreach($transaksi as $te => $value){
    //         //     return response()->json($transaksi['data']);
    //         // }
    //         // return response()->json($transaksi['data']['id_barang'][1]);

    //     }
    //     Alert::success('Berhasil', 'Data berhasil disimpan');
    //     return redirect()->route('transaksi.create');

    // }

    // public function destroyTransaksi(){

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::where('kode_invoice', $id)->with('status')->get();
        $detail = DetailTransaksi::where('kode_invoice', $id)->with('paket')->get();
        $data = [$transaksi, $detail];
        return response()->json($data);
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
        $transaksi = Transaksi::findOrFail($id);
        $detail = DetailTransaksi::where('kode_invoice', $transaksi->kode_invoice)->with('paket')->get();
        $toko = Outlet::all();
        $status = Status::all();
        return view('pages.transaksi.edit', compact('transaksi', 'toko', 'status', 'detail'));
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
        $data = $request->all();
        $transaksi = Transaksi::findOrFail($id);
        $tgl = null;
        $dibayar = 0;

        if($request->input('status') == 3){
            $tgl = date('Y-m-d');

        }

        if($request->input('status') == 4){
            $tgl = date('Y-m-d');
            $dibayar = 1;

        }

        $transaksi->update([
            'id_status' => $data['status'],
            'tgl_bayar' => $tgl,
            'dibayar' => $dibayar,
            'total_bayar' => $data['bayar'],

        ]);
        Alert::success('Berhasil','Data berhasil diperbarui');
        return redirect()->route('transaksi.index');

    }

    public function updateStatus(Request $request){
        $tgl = null;

        if($request->input('id_status') == 3){
            $tgl = date('Y-m-d');

        }

        Transaksi::where('kode_invoice', '=', $request->input('kode_invoice'))->update([
            'id_status' => $request->input('id_status'),
            'tgl_bayar' => $tgl
        ]);
        return response()->json([
            'message' => 'New post created'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        DetailTransaksi::where('kode_invoice', $transaksi->kode_invoice)->delete();
        $transaksi->delete();
        Alert::success('Berhasil!', 'Data berhasil dihapus.');
        return redirect()->back();
    }
}
