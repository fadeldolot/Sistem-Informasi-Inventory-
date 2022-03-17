<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request) {

            $data_produk = Produk::where('id_produk', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_produk', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {

            $data_produk = Produk::paginate(5);
        }



        return view('produk.produk', compact('data_produk', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'distributor' => 'required',
            'brand' => 'required',
        ]);


        Produk::create($validated);
        return redirect('/produk')->with('status', 'Data Produk Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update($request->all());
        return redirect('/produk')->with('status', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_produk = Produk::find($id);
        $data_produk->delete();
        return redirect('/produk')->with('status', 'Data Produk Berhasil Dihapus!');
    }
    public function print()
    {
        $data = Produk::all();
        return view('produk.print_produk_pdf', compact('data'));
    }
}
