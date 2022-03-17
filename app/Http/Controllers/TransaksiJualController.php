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
            'transaksi' => TransaksiJual::where('total', '!=', 0)->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
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
        $data['total'] = str_replace('.', '', $data['total']);
        $data['bayar'] = str_replace('.', '', $data['bayar']);
        $data['no_nota'] = "TJ" . str_replace('-', '', now()->format('Y-m-d')) . (TransaksiJual::count() + 1);
        TransaksiJual::find(TransaksiJual::max('id'))->update($data);

        return redirect(route('transaksi-jual.index'))->with('success', 'Data Telah Disimpan');
    }

    public function show($transaksi)
    {
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
        $transaksi->paving()->detach();
        $transaksi->delete();
        return redirect(route('transaksi-jual.index'))->with('success', 'Data Telah Disimpan');
    }
}
