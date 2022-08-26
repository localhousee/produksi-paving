<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BahanBaku;
use App\Models\TransaksiBeli;
use App\Models\TransaksiJual;

class ReportController extends Controller
{
    public function __invoke()
    {
        $start_date = format_date(request()->start);
        $end_date = format_date(request()->end);
        if ($start_date > $end_date) {
            return back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir');
        }

        $type = explode('/', url()->previous());
        $type =  end($type);
        if ($type === 'transaksi-jual') {
            $type = 'PENJUALAN PAVING';
        } else {
            $type = 'PEMBELIAN BAHAN BAKU';
        }

        $title = "LAPORAN $type $start_date s/d $end_date";
        $column = strpos($type, 'PENJUALAN') !== false ? 'Paving' : 'Bahan Baku';
        $data = $this->getData($column, request()->start, request()->end);
        $sum = $this->summary($data);

        Pdf::loadView('layouts.report', [
            'title' => $title,
            'column' => $column,
            'data' => $data,
            'sum' => $sum,
        ])->save(storage_path('app/public/report.pdf'));

        return response()->file(storage_path('app/public/report.pdf'));
    }

    private function getData($column, $start, $end)
    {
        $query = null;
        $foreign_column = null;

        if ($column === 'Paving') {
            $query = TransaksiJual::query();
            $foreign_column = 'paving_id';
        } else {
            $query = TransaksiBeli::query();
            $foreign_column = 'bahan_baku_id';
        }

        $transaksiPerHari = [];
        $data = $query->whereBetween('tgl_transaksi', [$start, $end])->where('total', '!=', 0)->orderBy('tgl_transaksi')->get();

        foreach ($data as $item) {
            $jenis = [];

            if ($column === 'Paving') {
                $keranjangPerHari = $item->keranjangJual()->get();
            } else {
                $keranjangPerHari = $item->keranjangBeli()->get();
            }

            foreach ($keranjangPerHari as $keranjang) {
                if ($column === 'Paving') {
                    $nama = Paving::find($keranjang->{$foreign_column});
                } else {
                    $nama = BahanBaku::find($keranjang->{$foreign_column});
                }
                $jenis[$nama->jenis] = ['qty' => $keranjang->qty, 'subtotal' => $keranjang->subtotal];
            }

            if ((array_key_exists($item->tgl_transaksi, $transaksiPerHari))) {
                foreach ($jenis as $key => $value) {
                    if (array_key_exists($key, $transaksiPerHari[$item->tgl_transaksi])) {
                        $transaksiPerHari[$item->tgl_transaksi][$key]['qty'] += $value['qty'];
                        $transaksiPerHari[$item->tgl_transaksi][$key]['subtotal'] += $value['subtotal'];
                    } else {
                        $transaksiPerHari[$item->tgl_transaksi][$key] = $value;
                    }
                }
            } else {
                $transaksiPerHari[$item->tgl_transaksi] = $jenis;
            }
        }
        return $transaksiPerHari;
    }

    private function summary($data)
    {
        $sum['data'] = [];
        $sum['total'] = 0;
        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if (array_key_exists($key, $sum['data'])) {
                    $sum['data'][$key]['qty'] += $value['qty'];
                    $sum['data'][$key]['subtotal'] += $value['subtotal'];
                } else {
                    $sum['data'][$key] = $value;
                }
                $sum['total'] += $value['subtotal'];
            }
        }

        return $sum;
    }
}
