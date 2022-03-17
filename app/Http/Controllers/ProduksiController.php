<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Http\Requests\ProduksiRequest;

class ProduksiController extends Controller
{
    public function index()
    {
        return view('produksi.index', [
            'produksi' => Produksi::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('produksi.create');
    }

    public function store(ProduksiRequest $request)
    {
        Produksi::create($request->validated());
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }

    public function edit(Produksi $produksi)
    {
        return view('produksi.edit', ['produksi' => $produksi]);
    }

    public function update(Produksi $produksi, ProduksiRequest $request)
    {
        $produksi->update($request->validated());
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Produksi $produksi)
    {
        $produksi->paving()->detach();
        $produksi->delete();
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }
}
