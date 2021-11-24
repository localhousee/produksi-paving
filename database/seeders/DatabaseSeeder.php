<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paving;
use App\Models\Pembeli;
use App\Models\Supplier;
use App\Models\BahanBaku;
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
        Supplier::factory(5)->create();
        Paving::factory()->create();
        BahanBaku::factory(2)->create();

        DB::table('bahan_baku_paving')->insert([
            ['paving_id' => 1, 'bahan_baku_id' => 1, 'jumlah' => 10],
            ['paving_id' => 1, 'bahan_baku_id' => 2, 'jumlah' => 5,],
        ]);
    }
}
