<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use App\Models\TransaksiBeli;
use App\Models\TransaksiJual;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $pendingPayments, $tasksPercentage, $barLabels,
        $barTransaksiBeli, $barTransaksiJual, $pieData, $pieLabels,
        $monthlyEarnings, $monthlyExpenses;

    public function __invoke()
    {
        $this->barLabels = $this->barLabels();
        $this->pieLabels = $this->pieLabels();
        $this->barTransaksiBeli = $this->barTransaksiBeli();
        $this->barTransaksiJual = $this->barTransaksiJual();
        $this->pieData = $this->pieData();
        $this->monthlyExpenses = $this->monthlyExpenses();
        $this->monthlyEarnings = $this->monthlyEarnings();
        $this->tasksPercentage = $this->tasksPercentage();
        $this->pendingPayments = $this->pendingPayments();

        return view('dashboard', [
            'barLabels' => $this->barLabels,
            'barTransaksiBeli' => $this->barTransaksiBeli,
            'barTransaksiJual' => $this->barTransaksiJual,
            'pieData' => $this->pieData,
            'pieLabels' => $this->pieLabels,
            'monthlyExpenses' => $this->monthlyExpenses,
            'monthlyEarnings' => $this->monthlyEarnings,
            'tasksPercentage' => $this->tasksPercentage,
            'pendingPayments' => $this->pendingPayments,
        ]);
    }

    private function pendingPayments()
    {
        return TransaksiJual::where('status', 'DP')->count();
    }

    private function tasksPercentage()
    {
        $transaksi = TransaksiJual::count();
        $transaksiLunas = TransaksiJual::where('status', 'lunas')->count();
        return round($transaksiLunas / $transaksi * 100);
    }

    private function monthlyExpenses()
    {
        return DB::table('transaksi_beli')->where('tgl_transaksi', 'like', now()->format('Y-m') . '%')->sum('total');
    }

    private function monthlyEarnings()
    {
        return DB::table('transaksi_jual')->where('tgl_transaksi', 'like', now()->format('Y-m') . '%')->sum('bayar');
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

    private function barTransaksiBeli()
    {
        $barData = [];

        for ($i = 1; $i <= count($this->barLabels); $i++) {
            $barData[] = TransaksiBeli::where('tgl_transaksi', 'like', now()->format('Y') . '-' . str_pad($i, 2, "0", STR_PAD_LEFT) . '%')->count();
        }

        return $barData;
    }

    private function barTransaksiJual()
    {
        $barData = [];

        for ($i = 1; $i <= count($this->barLabels); $i++) {
            $barData[] = TransaksiJual::where('tgl_transaksi', 'like', now()->format('Y') . '-' . str_pad($i, 2, "0", STR_PAD_LEFT) . '%')->count();
        }

        return $barData;
    }

    private function barLabels()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }
}
