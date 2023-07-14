<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];


    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
