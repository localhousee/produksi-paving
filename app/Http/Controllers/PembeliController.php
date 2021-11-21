<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembeliRequest;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function index()
    {
        return view('pembeli.index', [
            'pembeli' => Pembeli::all(),
        ]);
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(PembeliRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        // https://laravel.com/docs/8.x/validation#form-request-validation
        Pembeli::create($request->validated());
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', ['pembeli' => $pembeli]);
    }

    public function update(Pembeli $pembeli, PembeliRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $pembeli->update($request->validated());
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy(Pembeli $pembeli)
    {
        // https://laravel.com/docs/8.x/eloquent#deleting-models
        $pembeli->delete();
        return redirect(route('pembeli.index'))->with('success', 'Data Berhasil Disimpan');
    }
}
