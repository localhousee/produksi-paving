<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pembeli;
use App\Models\Produksi;
use App\Models\Supplier;
use App\Models\TransaksiJual;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'admin@example.com']);
        Pembeli::factory(5)->create();
        Supplier::factory(2)->create();
        $this->seedBahanBaku();
        $this->seedPaving();
        $this->seedBahanBakuPaving();
        $this->seedProduksi();
    }

    private function seedPaving()
    {
        $paving = [
            ['jenis' => 'Bata', 'stok' => 100, 'ukuran' => '10.5 x 21', 'harga' => 10000, 'deskripsi' => 'Bata', 'satuan' => 'Kg', 'gambar' => 'paving/bata.jpg'],
            ['jenis' => 'Segitiga', 'stok' => 100, 'ukuran' => '19.6 x 9.6', 'harga' => 10000, 'deskripsi' => 'Segitiga', 'satuan' => 'Kg', 'gambar' => 'paving/segitiga.jpg'],
            ['jenis' => 'Segienam', 'stok' => 100, 'ukuran' => '23', 'harga' => 10000, 'deskripsi' => 'Segienam', 'satuan' => 'Kg', 'gambar' => "paving/hexagon.jpg"],
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
