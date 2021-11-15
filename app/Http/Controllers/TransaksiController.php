<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    //
    public function index(){
        return view('pages.transaksi.index');
    }

    public function create(Request $request){


        $invoice = mt_rand(1000000,9999999);
        $invoice = 'INV'.$invoice;
        $produk = Produk::all();

        if($request->session()->has('transaksi') && $request->session()->has('kode_invoice')){
            $transaksi = $request->session()->get('transaksi');
            $invoices = $request->session()->get('kode_invoice');
            $nama = $request->session()->get('nama');
            return view('pages.transaksi.create', compact('produk', 'transaksi', 'invoices', 'nama'));
        }
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
    public function store(Request $request)
    {
        $data = $request->all();
        DetailTransaksi::created([
            'kode_invoice' => $data['kode_invoice'],
            'id_paket',
            'banyak',
            'harga',
            'total'
        ]);
        // Transaksi::create();
        return redirect('/manajemen_outlet')->with('status','data berhasil ditambahkan');
    }

    public function storeTransaksi(Request $request){
        $nama = $request->input('nama');
        $banyak = $request->input('jumlah');
        $kode_invoice = $request->input('kode_invoice');
        $id_barang = $request->input('barang');
        $harga = Produk::where('id', $id_barang)->get('harga');
        $nama_barang = Produk::where('id', $id_barang)->get('nama_paket');
        $satuan = $request->input('satuan');

        $banyaknya = $banyak.' '.$satuan;
        $total = intval($harga[0]['harga']) * $banyak;

        $row_id = md5($kode_invoice . serialize($id_barang));

        $data = [
            'data' => [
                'id_barang' => $id_barang,
                'barang' => $nama_barang[0]['nama_paket'],
                'banyak'=> $banyak,
                'harga' => $harga[0]['harga'],
                'row_id' => $row_id
            ]
        ];

        // return response()->json($data);

        if(!$request->session()->has('transaksi') && !$request->session()->has('kode_invoice')){
            $request->session()->put('transaksi', $data);
            $request->session()->put('kode_invoice', $kode_invoice);
            $request->session()->put('nama', $nama);
        } else{
            $exist = 0;
            $transaksi = $request->session()->get('transaksi');

            // return response()->json($transaksi['data']);

            foreach($transaksi as $tr => $value){
                if($transaksi[$tr]['id_barang'] == $id_barang){
                    $transaksi[$tr]['banyak'] += $banyak;
                    $transaksi[$tr]['harga'] += $harga;
                    $exist++;
                }

            }

            if ($exist == 0) {
                $newtransaksi = array_merge_recursive($transaksi, $data);
                $request->session()->put('transaksi', $newtransaksi);
            } else {
                $request->session()->put('transaksi', $transaksi);
            }

            // foreach($transaksi as $te => $value){
            //     return response()->json($transaksi['data']);
            // }
            // return response()->json($transaksi['data']['id_barang'][1]);

        }
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('transaksi.create');

    }

    public function destroyTransaksi(){

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
        // $transaksi = Transaksi::findOrFail($id);
        // return view('pages.transaksi.create', compact('transaksi'));
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
        //
    }
}
