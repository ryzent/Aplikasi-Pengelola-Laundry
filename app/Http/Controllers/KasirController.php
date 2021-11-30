<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    //
    public function index(){
        $toko = Outlet::count();
        $user = User::count();
        $member = Member::count();
        $toko_detail = Outlet::all();
        $transaksi = Transaksi::all();
        $baru = Transaksi::where('id_status', '1')->get();
        $proses = Transaksi::where('id_status', '2')->get();
        $selesai = Transaksi::where('id_status', '3')->get();
        return view('pages.cashier', compact('toko', 'user', 'member', 'toko_detail', 'transaksi', 'baru', 'proses', 'selesai'));
    }
}
