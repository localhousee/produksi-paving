<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduksiPavingRequest;
use App\Models\Paving;
use App\Models\Produksi;

class ProduksiPavingController extends Controller
{
    public function index(Produksi $produksi)
    {
        return view('produksi.paving.index', [
            'produksi' => $produksi,
            'paving' => $produksi->paving()->get(),
        ]);
    }

    public function create(Produksi $produksi)
    {
        return view('produksi.paving.create', [
            'produksi' => $produksi,
            'paving' => Paving::all()
        ]);
    }

    public function store(Produksi $produksi, ProduksiPavingRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $produksi->paving()->attach($request->paving_id, [
            'jumlah_produksi' => $request->jumlah_produksi,
            'jumlah_bahanbaku_dipakai' => $request->jumlah_bahanbaku_dipakai,
        ]);
        return redirect(route('produksi.paving.index', ['produksi' => $produksi]))->with('success', 'Data Telah Disimpan');
    }

    public function edit(Produksi $produksi, Paving $paving)
    {
        return view('produksi.paving.edit', [
            'produksi' => $produksi,
            'paving' => $produksi->paving()->find($paving)
        ]);
    }

    public function update(Produksi $produksi, Paving $paving, ProduksiPavingRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#updating-a-record-on-the-intermediate-table
        $produksi->paving()->updateExistingPivot($paving, [
            'jumlah_produksi' => $request->jumlah_produksi,
            'jumlah_bahanbaku_dipakai' => $request->jumlah_bahanbaku_dipakai,
        ]);
        return redirect(route('produksi.paving.index', ['produksi' => $produksi]))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Produksi $produksi, Paving $paving)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $produksi->paving()->detach($paving);
        return redirect(route('produksi.paving.index', ['produksi' => $produksi]))->with('success', 'Data Telah Disimpan');
    }
}
