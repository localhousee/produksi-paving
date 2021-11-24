<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use App\Models\TransaksiJual;
use App\Http\Requests\KeranjangJualRequest;
use App\Models\KeranjangJual;

class KeranjangJualController extends Controller
{
    public function create()
    {
        $transaksi = TransaksiJual::firstOrCreate([
            'no_nota' => 'TJ',
            'tgl_transaksi' => now()->format('Y-m-d'),
            'total' => 0,
            'bayar' => 0,
            'status' => 'lunas',
        ]);

        return view('transaksijual.keranjang.create', [
            'paving' => Paving::all(),
            'keranjang' => $transaksi->paving()->get(),
        ]);
    }

    public function store(KeranjangJualRequest $request)
    {
        $transaksi = TransaksiJual::find(TransaksiJual::max('id'));

        $paving = Paving::find($request->paving_id);
        $paving->transaksi_jual()->attach($transaksi, [
            'qty' => $request->qty,
            'subtotal' => $paving->harga * $request->qty
        ]);

        $paving->update(['stok' => $paving->stok - $request->qty]);

        return redirect(route('keranjang-jual.create'))->with('Data Telah Disimpan');
    }

    public function edit($keranjang)
    {
        return view('transaksijual.keranjang.edit', [
            'keranjang' => KeranjangJual::find($keranjang),
        ]);
    }

    public function update(KeranjangJualRequest $request, $keranjang)
    {
        $keranjang = KeranjangJual::find($keranjang);
        $transaksi = TransaksiJual::find($keranjang->transaksi_jual_id);
        $paving = $transaksi->paving()->find($keranjang->paving_id)->first();

        $paving->update([
            'stok' => $paving->stok + $keranjang->qty - $request->qty
        ]);

        $transaksi->paving()->updateExistingPivot($paving, [
            'qty' => $request->qty,
            'subtotal' => $request->qty * $paving->harga,
        ]);

        return redirect(route('keranjang-jual.create'))->with('Data Telah Disimpan');
    }

    public function destroy($keranjang)
    {
        $keranjang = KeranjangJual::find($keranjang);
        $transaksi = TransaksiJual::find($keranjang->transaksi_jual_id);
        $paving = $transaksi->paving()->find($keranjang->paving_id)->first();
        
        $paving->update([
            'stok' =>$paving->stok + $transaksi->paving[0]->paving->qty,
        ]);

        $keranjang->delete();

        return redirect(route('keranjang-jual.create'))->with('Data Telah Disimpan');
    }
}
