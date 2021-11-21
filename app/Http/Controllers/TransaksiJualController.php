<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiJualRequest;
use App\Models\Paving;
use App\Models\Pembeli;
use App\Models\TransaksiJual;

class TransaksiJualController extends Controller
{
    public function index()
    {
        return view('transaksijual.index', [
            'transaksi' => TransaksiJual::all(),
        ]);
    }

    public function create()
    {
        return view('transaksijual.create', [
            'pembeli' => Pembeli::all(),
            'paving' => Paving::all(),
        ]);
    }

    public function store(TransaksiJualRequest $request)
    {
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        // https://laravel.com/docs/8.x/requests#retrieving-a-portion-of-the-input-data
        $transaksi = TransaksiJual::create($request->except('paving_id', 'harga', 'qty', 'subtotal'));

        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $transaksi->paving()->attach($request->paving_id, [
            'harga' => $request->harga,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal
        ]);

        return redirect(route('transaksi-jual.index'))->with('success', 'Data Telah Disimpan');
    }

    public function show($transaksi)
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
        // https://laravel.com/docs/8.x/eloquent-collections#method-find
        $transaksi = TransaksiJual::with(['pembeli:id,nama', 'paving:id,jenis'])->find($transaksi);
        return view('transaksijual.show', [
            'transaksi' => $transaksi,
        ]);
    }

    public function edit($transaksi)
    {   
        $transaksi = TransaksiJual::with(['pembeli:id,nama', 'paving:id,jenis'])->find($transaksi);
        return view('transaksijual.edit', [
            'transaksi' => $transaksi,
        ]);
    }

    public function update($transaksi, TransaksiJualRequest $request)
    {
        $transaksi = TransaksiJual::find($transaksi);

        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $transaksi->update($request->except(['paving_id', 'harga', 'qty', 'subtotal']));
        
        // https://laravel.com/docs/8.x/eloquent-relationships#updating-a-record-on-the-intermediate-table
        $transaksi->paving()->updateExistingPivot($request->paving_id, [
            'harga' => $request->harga,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
        ]);

        return redirect(route('transaksi-jual.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy($transaksi)
    {
        $transaksi = TransaksiJual::find($transaksi);
        // https://laravel.com/docs/8.x/eloquent-relationships#attaching-detaching
        $transaksi->paving()->detach();
        // https://laravel.com/docs/8.x/eloquent#deleting-models
        $transaksi->delete();
        return redirect(route('transaksi-jual.index'))->with('success', 'Data Telah Disimpan');
    }
}
