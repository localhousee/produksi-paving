<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Http\Requests\ProduksiRequest;

class ProduksiController extends Controller
{
    public function index()
    {
        return view('produksi.index', [
            'produksi' => Produksi::all(),
        ]);
    }

    public function create()
    {
        return view('produksi.create');
    }

    public function store(ProduksiRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        // https://laravel.com/docs/8.x/validation#form-request-validation
        Produksi::create($request->validated());
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }

    public function edit(Produksi $produksi)
    {
        return view('produksi.edit', ['produksi' => $produksi]);
    }

    public function update(Produksi $produksi, ProduksiRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $produksi->update($request->validated());
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Produksi $produksi)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $produksi->paving()->detach();
        // https://laravel.com/docs/8.x/eloquent#deleting-models
        $produksi->delete();  
        return redirect(route('produksi.index'))->with('success', 'Data Telah Disimpan');
    }
}
