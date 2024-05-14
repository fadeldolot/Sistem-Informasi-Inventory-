<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $distributors = Distributor::paginate(5);    

        return view('distributor.index', compact('distributors', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_distributor' => 'required|unique:distributor',
            'no_hp' => 'required',
        ]);


        Distributor::create($validated);
        return redirect('/distributor')->with('toast_success','Data Distributor Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('distributor.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        Distributor::where('id', $distributor->id)
            ->update([
                'nama_distributor' => $request->nama_distributor,
                'no_hp' => $request->no_hp
            ]);
        return redirect('/distributor')->with('status', 'Data Distributor Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        Distributor::destroy($distributor->id);
        return redirect('/distributor')->with('status', 'Data Distributor Berhasil Dihapus!');
    }
}