<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\KeranjangBeli;
use App\Models\TransaksiBeli;
use App\Http\Requests\KeranjangBeliRequest;

class KeranjangBeliController extends Controller
{
    public function create()
    {
        $transaksi = TransaksiBeli::firstOrCreate([
            'no_nota' => 'TB',
            'tgl_transaksi' => now()->format('Y-m-d'),
            'total' => 0,
        ]);

        return view('transaksibeli.keranjang.create', [
            'bahanBaku' => BahanBaku::all(),
            'keranjang' => $transaksi->bahan_baku()->get(),
        ]);
    }

    public function store(KeranjangBeliRequest $request)
    {
        $transaksi = TransaksiBeli::find(TransaksiBeli::max('id'));

        $bahanBaku = BahanBaku::find($request->bahan_baku_id);
        $bahanBaku->transaksi_beli()->attach($transaksi, [
            'qty' => $request->qty,
            'subtotal' => $bahanBaku->harga * $request->qty
        ]);

        $bahanBaku->update(['stok' => $bahanBaku->stok + $request->qty]);

        return redirect(route('keranjang-beli.create'))->with('Data Telah Disimpan');
    }

    public function edit($keranjang)
    {
        return view('transaksibeli.keranjang.edit', [
            'keranjang' => KeranjangBeli::find($keranjang),
        ]);
    }

    public function update(KeranjangBeliRequest $request, $keranjang)
    {
        $keranjang = KeranjangBeli::find($keranjang);
        $transaksi = TransaksiBeli::find($keranjang->transaksi_beli_id);
        $bahanBaku = $transaksi->bahan_baku()->find($keranjang->bahan_baku_id)->first();

        $bahanBaku->update([
            'stok' => $bahanBaku->stok - $keranjang->qty + $request->qty
        ]);

        $transaksi->bahan_baku()->updateExistingPivot($bahanBaku, [
            'qty' => $request->qty,
            'subtotal' => $request->qty * $bahanBaku->harga,
        ]);

        return redirect(route('keranjang-beli.create'))->with('Data Telah Disimpan');
    }

    public function destroy($keranjang)
    {
        $keranjang = KeranjangBeli::find($keranjang);
        $transaksi = TransaksiBeli::find($keranjang->transaksi_beli_id);
        $bahanBaku = $transaksi->bahan_baku()->find($keranjang->bahan_baku_id)->first();
        
        $bahanBaku->update([
            'stok' =>$bahanBaku->stok - $transaksi->bahan_baku[0]->bahan_baku->qty,
        ]);

        $keranjang->delete();

        return redirect(route('keranjang-beli.create'))->with('Data Telah Disimpan');
    }
}
