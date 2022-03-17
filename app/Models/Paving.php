<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paving extends Model
{
    use HasFactory;

    // https://laravel.com/docs/8.x/eloquent#table-names
    // https://laravel.com/docs/8.x/eloquent#timestamps
    // https://laravel.com/docs/8.x/eloquent#allowing-mass-assignment
    protected $table = 'paving';
    public $timestamps = false;
    protected $guarded = [];

    public function produksi()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
        return $this->belongsToMany(Produksi::class, 'produksi_paving')
            // https://laravel.com/docs/8.x/eloquent-relationships#customizing-the-pivot-attribute-name
            ->as('produksi')
            // https://laravel.com/docs/8.x/eloquent-relationships#retrieving-intermediate-table-columns
            ->withPivot('jumlah_produksi');
    }

    public function bahan_baku()
    {
        return $this->belongsToMany(BahanBaku::class, 'bahan_baku_paving')
            ->as('bahan_baku')
            ->withPivot('jumlah');
    }

    public function transaksi_jual()
    {
        return $this->belongsToMany(TransaksiJual::class, 'keranjang_jual')
            ->as('transaksi_jual')
            ->withPivot('qty', 'subtotal');
    }
}
