<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Member;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index(){
        $toko = Outlet::count();
        $user = User::count();
        $member = Member::count();
        $toko_detail = Outlet::all();
        $transaksi = Transaksi::where('id_status', '!=', '4')->get();
        return view('pages.admin',[
            'toko' => $toko,
            'user' => $user,
            'member' => $member,
            'toko_detail' => $toko_detail,
            'transaksi' => $transaksi
        ]);
    }
}
