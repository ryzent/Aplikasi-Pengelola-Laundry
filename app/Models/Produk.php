<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\EnumeratesValues;

class Produk extends Model
{
    //use HasFactory;
    protected $fillable = ['id_outlet','nama_paket','jenis','harga'];

    public function toko(){
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
}
