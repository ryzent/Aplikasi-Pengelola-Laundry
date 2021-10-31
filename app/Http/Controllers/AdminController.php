<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Member;

class AdminController extends Controller
{
    public function index(){
        $toko = Outlet::count();
        $user = User::count();
        $member = Member::count();
        $toko_detail = Outlet::all();
        return view('pages.admin',[
            'toko' => $toko,
            'user' => $user,
            'member' => $member,
            'toko_detail' => $toko_detail
        ]);
    }
}
