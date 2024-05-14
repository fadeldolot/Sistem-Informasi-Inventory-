<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributor';
    protected $fillable = ['nama_distributor', 'no_hp'];

    public function produk()
    {
        return $this->hasOne(Produk::class);
    }
}