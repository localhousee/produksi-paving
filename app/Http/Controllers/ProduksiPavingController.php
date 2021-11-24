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
        ]);

        $paving = Paving::find($request->paving_id);
        $paving->update(['stok' => $paving->stok + $request->jumlah_produksi]);

        $bahanBaku = Paving::find($request->paving_id)->bahan_baku()->get();
        
        foreach($bahanBaku as $b) {
            $b->stok = $b->stok - ($request->jumlah_produksi * $b->bahan_baku->jumlah);
            $b->save();
        }

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
        $bahanBaku = $paving->bahan_baku()->get();

        // Mengembalikan Stok Semua Bahan Baku Paving
        foreach($bahanBaku as $b) {
            foreach($produksi->paving as $p) {
                $b->stok = $b->stok + ($p->paving->jumlah_produksi * $b->bahan_baku->jumlah) - ($request->jumlah_produksi * $b->bahan_baku->jumlah);
                $p->stok = $p->stok - $p->paving->jumlah_produksi;
                $p->save();
                $b->save();
            }
        }

        $produksi->paving()->updateExistingPivot($paving, [
            'jumlah_produksi' => $request->jumlah_produksi,
        ]);

        $produksiSebelumnya = $produksi->paving()->first()->paving->jumlah_produksi;
        $paving->update(['stok' => $paving->stok - $produksiSebelumnya + $request->jumlah_produksi]);

        return redirect(route('produksi.paving.index', ['produksi' => $produksi]))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Produksi $produksi, Paving $paving)
    {
        $bahanBaku = $paving->bahan_baku()->get();
        foreach($bahanBaku as $b) {
            foreach($produksi->paving as $p) {
                $b->stok = $b->stok + ($p->paving->jumlah_produksi * $b->bahan_baku->jumlah);
                $p->stok = $p->stok + $p->paving->jumlah_produksi;
                $p->save();
                $b->save();
            }
        }

        $produksiSebelumnya = $produksi->paving()->first()->paving->jumlah_produksi;
        $paving->update(['stok' => $paving->stok - $produksiSebelumnya]);
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $produksi->paving()->detach($paving);
        return redirect(route('produksi.paving.index', ['produksi' => $produksi]))->with('success', 'Data Telah Disimpan');
    }
}
