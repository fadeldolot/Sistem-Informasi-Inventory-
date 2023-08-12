<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i'
    ];


    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
