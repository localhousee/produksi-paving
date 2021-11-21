<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index', [
            'supplier' => Supplier::all(),
        ]);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(SupplierRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        // https://laravel.com/docs/8.x/validation#form-request-validation
        Supplier::create($request->validated());
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Supplier $supplier, SupplierRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $supplier->update($request->validated());
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy(Supplier $supplier)
    {
        // https://laravel.com/docs/8.x/eloquent#deleting-models
        $supplier->delete();
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }
}
