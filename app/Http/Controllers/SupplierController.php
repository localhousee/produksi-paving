<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index', [
            'supplier' => Supplier::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(SupplierRequest $request)
    {
        Supplier::create($request->validated());
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Supplier $supplier, SupplierRequest $request)
    {
        $supplier->update($request->validated());
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect(route('supplier.index'))->with('success', 'Data Berhasil Disimpan');
    }
}
