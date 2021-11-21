<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\BahanBaku;
use App\Models\TransaksiBeli;
use App\Http\Requests\TransaksiBeliRequest;

class TransaksiBeliController extends Controller
{
    public function index()
    {
        return view('transaksibeli.index', [
            'transaksi' => TransaksiBeli::all(),
        ]);
    }

    public function create()
    {
        return view('transaksibeli.create', [
            'supplier' => Supplier::all(),
            'bahan_baku' => BahanBaku::all(),
        ]);
    }

    public function store(TransaksiBeliRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        // https://laravel.com/docs/8.x/requests#retrieving-a-portion-of-the-input-data
        $transaksi = TransaksiBeli::create($request->except('bahan_baku_id', 'harga', 'qty', 'subtotal'));
        
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $transaksi->bahan_baku()->attach($request->bahan_baku_id, [
            'harga' => $request->harga,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
        ]);

        return redirect(route('transaksi-beli.index'))->with('success', 'Data Telah Disimpan');
    }

    public function show($transaksi)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
        // https://laravel.com/docs/8.x/eloquent-collections#method-find
        $transaksi = TransaksiBeli::with(['supplier:id,nama_supplier', 'bahan_baku:id,jenis'])->find($transaksi);
        return view('transaksibeli.show', [
            'transaksi' => $transaksi,
        ]);
    }

    public function edit($transaksi)
    {
        $transaksi = TransaksiBeli::with(['supplier:id,nama_supplier', 'bahan_baku:id,jenis'])->find($transaksi);
        return view('transaksibeli.edit', [
            'transaksi' => $transaksi,
        ]);
    }

    public function update($transaksi, TransaksiBeliRequest $request)
    {
        $transaksi = TransaksiBeli::find($transaksi);

        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $transaksi->update($request->except(['bahan_baku_id', 'harga', 'qty', 'subtotal']));
        
        // https://laravel.com/docs/8.x/eloquent-relationships#updating-a-record-on-the-intermediate-table
        $transaksi->bahan_baku()->updateExistingPivot($request->bahan_baku_id, [
            'harga' => $request->harga,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
        ]);

        return redirect(route('transaksi-beli.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy($transaksi)
    {
        $transaksi = TransaksiBeli::find($transaksi);
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $transaksi->bahan_baku()->detach();
        // https://laravel.com/docs/8.x/eloquent#deleting-models
        $transaksi->delete();
        return redirect(route('transaksi-beli.index'))->with('success', 'Data Telah Disimpan');
    }
}
