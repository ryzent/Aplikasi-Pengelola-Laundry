<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Member;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        $toko = Outlet::count();
        $user = User::count();
        $member = Member::count();
        $toko_detail = Outlet::all();
        $transaksi = Transaksi::all();
        $baru = Transaksi::where('id_status', '1')->get();
        $proses = Transaksi::where('id_status', '2')->get();
        $selesai = Transaksi::where('id_status', '3')->get();
        $produk = Produk::all();

        $today = Transaksi::whereDate('tgl_bayar', Carbon::today())->sum('total_bayar');
        $week = Transaksi::whereBetween('tgl_bayar', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_bayar');
        $month = Transaksi::whereMonth('tgl_bayar', date('m'))->sum('total_bayar');
        $year = Transaksi::whereYear('tgl_bayar', Carbon::now()->format('y') )->sum('total_bayar');

        return view('pages.admin',[
            'toko' => $toko,
            'user' => $user,
            'member' => $member,
            'toko_detail' => $toko_detail,
            'transaksi' => $transaksi,
            'baru' => $baru,
            'proses' => $proses,
            'selesai' => $selesai,
            'produk' => $produk,
            'today' => $today,
            'week' => $week,
            'month' => $month,
            'year' => $year,
        ]);
    }
}
