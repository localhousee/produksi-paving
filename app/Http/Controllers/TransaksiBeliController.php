<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\TransaksiBeli;
use App\Http\Requests\TransaksiBeliRequest;
use App\Models\KeranjangBeli;

class TransaksiBeliController extends Controller
{
    public function index()
    {
        return view('transaksibeli.index', [
            'transaksi' => TransaksiBeli::where('total', '!=', 0)->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
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
        TransaksiBeli::find(TransaksiBeli::max('id'))->update($data);

        return redirect(route('transaksi-beli.index'))->with('success', 'Data Telah Disimpan');
    }

    public function show($transaksi)
    {
        $transaksi = TransaksiBeli::with(['supplier:id,nama_supplier', 'bahan_baku:id,jenis'])->find($transaksi);

        return view('transaksibeli.show', ['transaksi' => $transaksi]);
    }

    public function destroy($transaksi)
    {
        $transaksi = TransaksiBeli::find($transaksi);
        $transaksi->bahan_baku()->detach();
        $transaksi->delete();
        return redirect(route('transaksi-beli.index'))->with('success', 'Data Telah Disimpan');
    }
}
