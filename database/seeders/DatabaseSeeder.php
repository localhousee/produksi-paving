<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paving;
use App\Models\Pembeli;
use App\Models\Produksi;
use App\Models\Supplier;
use App\Models\BahanBaku;
use App\Models\KeranjangJual;
use App\Models\KeranjangBeli;
use App\Models\TransaksiJual;
use App\Models\TransaksiBeli;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create(['email' => 'admin@produksi-paving']);
        Pembeli::factory(30)->create();
        Supplier::factory(2)->create();
        $this->seedBahanBaku();
        $this->seedPaving();
        $this->seedBahanBakuPaving();
        $this->seedProduksi();
        $this->seedTransaksiJual();
        $this->seedTransaksiBeli();
    }

    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    
    private function seedTransaksiBeli()
    {
        for ($i = 1; $i <= 12; $i++) {

            for ($j = 1; $j <= 31; $j++) {

                $randomNumbers = rand(1, 3);

                for ($k = 0; $k < $randomNumbers; $k++) {
                    $date = now()->format('Y') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);

                    if (!$this->validateDate($date, 'Y-m-d')) {
                        continue;
                    }

                    $randomBahanBaku = BahanBaku::find(rand(1, 2));

                    $transaksi = TransaksiBeli::create([
                        'no_nota' => 'TB' . now()->format('Y') . $i . $j . $k,
                        'tgl_transaksi' => $date,
                        'total' => 0,
                        'supplier_id' => rand(1, 2),
                    ]);

                    $keranjang = KeranjangBeli::create([
                        'transaksi_beli_id' => $transaksi->id,
                        'bahan_baku_id' => $randomBahanBaku->id,
                        'qty' => $qty = rand(10, 100),
                        'subtotal' => $qty * $randomBahanBaku->harga,
                    ]);

                    $transaksi->update([
                        'total' => $keranjang->subtotal,
                    ]);
                }
            }
        }
    }

    private function seedTransaksiJual()
    {
        for ($i = 1; $i <= 12; $i++) {

            for ($j = 1; $j <= 31; $j++) {

                $randomNumbers = rand(1, 3);

                for ($k = 0; $k < $randomNumbers; $k++) {
                    $date = now()->format('Y') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '-' . str_pad($j, 2, '0', STR_PAD_LEFT);

                    if (!$this->validateDate($date, 'Y-m-d')) {
                        continue;
                    }

                    $randomPaving = Paving::inrandomOrder()->first();

                    $transaksi = TransaksiJual::create([
                        'no_nota' => 'TJ' . now()->format('Y') . $i . $j . $k,
                        'tgl_transaksi' => $date,
                        'bayar' => 0,
                        'total' => 0,
                        'status' => 'lunas',
                        'pembeli_id' => rand(1, 30),
                    ]);

                    $keranjang = KeranjangJual::create([
                        'transaksi_jual_id' => $transaksi->id,
                        'paving_id' => $randomPaving->id,
                        'qty' => $qty = rand(10, 1000),
                        'subtotal' => $qty * $randomPaving->harga,
                    ]);

                    $transaksi->update([
                        'bayar' => $keranjang->subtotal,
                        'total' => $keranjang->subtotal,
                    ]);
                }
            }
        }
    }

    private function seedPaving()
    {
        $paving = [
            ['jenis' => 'Bata', 'stok' => 100, 'ukuran' => '10.5 x 21', 'harga' => 10000, 'deskripsi' => 'Bata', 'satuan' => 'Kg', 'gambar' => null],
            ['jenis' => 'Segitiga', 'stok' => 100, 'ukuran' => '19.6 x 9.6', 'harga' => 10000, 'deskripsi' => 'Segitiga', 'satuan' => 'Kg', 'gambar' => null],
            ['jenis' => 'Segienam', 'stok' => 100, 'ukuran' => '23', 'harga' => 10000, 'deskripsi' => 'Segienam', 'satuan' => 'Kg', 'gambar' => null],
        ];

        DB::table('paving')->insert($paving);
    }

    private function seedBahanBaku()
    {
        $bahanBaku = [
            [
                'jenis' => 'abu batu',
                'merk' => 'UD Jaya Sentosa',
                'harga' => 1000000,
                'stok' => 100,
                'satuan' => 'm3',
            ], [
                'jenis' => 'semen',
                'merk' => 'Semen 10 Roda',
                'harga' => 50000,
                'stok' => 100,
                'satuan' => 'sak',
            ]
        ];

        DB::table('bahan_baku')->insert($bahanBaku);
    }

    private function seedProduksi()
    {
        Produksi::factory(3)->create();

        $produksi = Produksi::all();

        foreach ($produksi as $produksi) {
            for ($i = 1; $i < 4; $i++) {
                $produksi->paving()->attach($i, ['jumlah_produksi' => rand(10, 30)]);
            }
        }
    }

    private function seedBahanBakuPaving()
    {
        DB::table('bahan_baku_paving')->insert([
            ['paving_id' => 1, 'bahan_baku_id' => 1, 'jumlah' => 10],
            ['paving_id' => 1, 'bahan_baku_id' => 2, 'jumlah' => 5],
            ['paving_id' => 2, 'bahan_baku_id' => 1, 'jumlah' => 10],
            ['paving_id' => 2, 'bahan_baku_id' => 2, 'jumlah' => 5],
            ['paving_id' => 3, 'bahan_baku_id' => 1, 'jumlah' => 10],
            ['paving_id' => 3, 'bahan_baku_id' => 2, 'jumlah' => 5],
        ]);
    }
}
