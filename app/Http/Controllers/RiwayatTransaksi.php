<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Outlet;

use RealRashid\SweetAlert\Facades\Alert;

class RiwayatTransaksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('id_status', '!=', '4')->get();
        $status = Status::all();
        return view('pages.riwayat-transaksi.index',[
            'transaksi' => $transaksi,
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

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
        $total = DetailTransaksi::where('kode_invoice', $transaksi->kode_invoice)->get('total')->sum('total');
        $toko = Outlet::all();
        $status = Status::all();
        return view('pages.riwayat-transaksi.edit', compact('transaksi', 'toko', 'status', 'detail', 'total'));
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


        ]);
        Alert::success('Berhasil','Data berhasil diperbarui');
        return redirect()->route('riwayat-transaksi.index');

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

    public function bayarTransaksi(Request $request){
        $kode_invoice = $request->input('kode_invoice');
        $tgl = date('Y-m-d');

        Transaksi::where('kode_invoice', '=', $kode_invoice)->update([
            'id_status' => '4',
            'dibayar' => '1',
            'total_bayar' => $request->input('bayar_total'),
            'tgl_bayar' => $tgl,

        ]);
        Alert::success('Berhasil!', 'Pembayaran berhasil dilakukan!');
        return redirect()->route('riwayat-transaksi.index');
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
