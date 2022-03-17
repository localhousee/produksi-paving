<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembeliRequest;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function index()
    {
        return view('pembeli.index', [
            'pembeli' => Pembeli::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(PembeliRequest $request)
    {
        Pembeli::create($request->validated());
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', ['pembeli' => $pembeli]);
    }

    public function update(Pembeli $pembeli, PembeliRequest $request)
    {
        $pembeli->update($request->validated());
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
