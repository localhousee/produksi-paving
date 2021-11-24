<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\TransaksiJual;
use App\Http\Requests\TransaksiJualRequest;
use App\Models\KeranjangJual;

class TransaksiJualController extends Controller
{
    public function index()
    {
        return view('transaksijual.index', [
            'transaksi' => TransaksiJual::where('total', '!=', 0)->get()
        ]);
    }

    public function create()
    {
        // https://laravel.com/docs/8.x/queries#aggregates
        $transaksi = TransaksiJual::max('id');
        return view('transaksijual.create', [
            'pembeli' => Pembeli::all(),
            'transaksi' => TransaksiJual::find($transaksi),
            'total' => KeranjangJual::where('transaksi_jual_id', $transaksi)->sum('subtotal'),
        ]);
    }

    public function store(TransaksiJualRequest $request)
    {
        $data = $request->validated();
        $data['no_nota'] = "TJ" . str_replace('-', '', now()->format('Y-m-d')) . (TransaksiJual::count() + 1);
        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        TransaksiJual::find(TransaksiJual::max('id'))->update($data);

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
        $transaksi = TransaksiJual::find($transaksi);
        $transaksi->status = 'lunas';
        $transaksi->bayar = $transaksi->total;
        $transaksi->save();
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
