<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {

            $penjualan = Penjualan::where('created_at', 'LIKE', '%' . $request->search . '%')
                ->orWhere('jumlah', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {

            $penjualan = Penjualan::paginate(5);
        }
        return view('penjualan.data_penjualan', compact('penjualan', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $produks = Produk::all();
        return view('penjualan.input_data_penjualan', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'produk_id' => 'required',
            'nama_produk' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'total_harga' => 'required'
        ]);

        $penjualan = new Penjualan;
        $penjualan->produk_id = $request->produk_id;
        $penjualan->nama_produk = $request->nama_produk;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->satuan = $request->satuan;
        $penjualan->harga = $request->harga;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();
        return redirect('/data_penjualan')->with('status', 'Data Penjualan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
    public function print()
    {
        $data = Penjualan::all();
        return view('penjualan.printpdf', compact('data'));
    }
}
