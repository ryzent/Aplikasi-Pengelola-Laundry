<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LandingController extends Controller
{
    //
    public function index(Request $request){
        if($request->session()->has('antrian')){
            $antrian = $request->session()->get('antrian');
            // return redirect('/')->with(['antrian' => $antrian]);
            return view('welcome', compact('antrian'));
        }
        return view('welcome');
    }

    public function statusTransaksi(Request $request){
        $kode_invoice = $request->input('cek_invoice');
        $transaksi = Transaksi::where('kode_invoice', $kode_invoice)->get();
        // $transaksi = Transaksi::where('kode_invoice', '=','INV8998730')->get();

        $request->session()->put('antrian', $transaksi);

        return redirect('/');

    }
}
