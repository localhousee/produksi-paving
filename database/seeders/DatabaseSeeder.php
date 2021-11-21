<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use App\Models\User;
use App\Models\Paving;
use App\Models\Pembeli;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

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
        Paving::factory(5)->create();
        BahanBaku::factory(2)->create();
    }
}
