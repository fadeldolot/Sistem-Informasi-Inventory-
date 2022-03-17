<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {

        $penjualan = Penjualan::all();
        $nama = [];
        $jual = [];

        foreach ($penjualan as $item) {

            $nama[] = $item->produk->nama_produk;
            $jual[] = $item->jumlah;
        }



        return view('user.home_user', compact('nama', 'jual'));
    }
}
