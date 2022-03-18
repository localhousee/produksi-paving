<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use App\Models\TransaksiJual;

class DashboardController extends Controller
{
    private $barLabels, $pieLabels, $barData, $pieData;

    public function __invoke()
    {
        $this->barLabels = $this->labels();
        $this->pieLabels = $this->pieLabels();
        $this->barData = $this->barData();
        $this->pieData = $this->pieData();

        return view('dashboard', [
            'barLabels' => $this->barLabels,
            'barData' => $this->barData,
            'pieLabels' => $this->pieLabels,
            'pieData' => $this->pieData,
        ]);
    }

    private function pieData()
    {
        $paving = Paving::with(['transaksi_jual' => function ($query) {
            $query->whereYear('tgl_transaksi', now()->format('Y'));
        }])->get();

        $pieData = [];

        foreach ($paving as $p) {
            $counter = 0;

            foreach ($p->transaksi_jual as $t) {
                $counter += $t->transaksi_jual->qty;
            }

            $pieData[] = $counter;
        }

        return $pieData;
    }

    private function pieLabels()
    {
        $paving = Paving::get('jenis');
        $pieLabels = [];
        foreach ($paving as $p) {
            $pieLabels[] = $p->jenis;
        }
        return $pieLabels;
    }

    private function barData()
    {
        $barData = [];

        for ($i = 1; $i <= count($this->barLabels); $i++) {
            $barData[] = TransaksiJual::where('tgl_transaksi', 'like', now()->format('Y') . '-' . str_pad($i, 2, "0", STR_PAD_LEFT) . '%')->count();
        }

        return $barData;
    }

    private function labels()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }
}
