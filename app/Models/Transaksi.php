<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status(){
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function toko(){
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
