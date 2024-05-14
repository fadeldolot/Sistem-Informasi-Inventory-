<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'id_produk',
    //     'nama_produk',
    //     'satuan',
    //     'harga',
    //     'stok',
    //     'distributor',
    //     'brand',
    // ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i'
    ];


    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function getdistributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestProduct = static::latest()->first();

            if ($latestProduct) {
                $latestId = intval(substr($latestProduct->id_produk, -2)); // Ambil dua digit terakhir
                $newId = str_pad($latestId + 1, 2, '0', STR_PAD_LEFT); // Tambah 1 dan padding nol di depan jika perlu
            } else {
                $newId = '01'; // Jika belum ada data, id dimulai dari 01
            }

            $year = date('y'); // Ambil dua digit tahun
            $model->id_produk = "P$year$newId"; // Format id_produk
        });
    }
}