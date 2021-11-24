<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\BahanBaku;
use App\Models\TransaksiBeli;
use App\Http\Requests\TransaksiBeliRequest;
use App\Models\KeranjangBeli;

class TransaksiBeliController extends Controller
{
    public function index()
    {
        return view('transaksibeli.index', [
            'transaksi' => TransaksiBeli::where('total', '!=', 0)->get()
        ]);
    }

    public function create()
    {
        // https://laravel.com/docs/8.x/queries#aggregates
        $transaksi = TransaksiBeli::max('id');
        return view('transaksibeli.create', [
            'supplier' => Supplier::all(),
            'transaksi' => TransaksiBeli::find($transaksi),
            'total' => KeranjangBeli::where('transaksi_beli_id', $transaksi)->sum('subtotal'),
        ]);
    }

    public function store(TransaksiBeliRequest $request)
    {
        $data = $request->validated();
        $data['no_nota'] = "TB" . str_replace('-', '', now()->format('Y-m-d')) . (TransaksiBeli::count() + 1);
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        TransaksiBeli::find(TransaksiBeli::max('id'))->update($data);

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
