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

    // https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
    public function getGambarAttribute($value)
    {
        return '/storage/' . $value;
    }

    public function produksi()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
        return $this->belongsToMany(Produksi::class, 'produksi_has_paving')
        // https://laravel.com/docs/8.x/eloquent-relationships#customizing-the-pivot-attribute-name
        ->as('produksi')
        // https://laravel.com/docs/8.x/eloquent-relationships#retrieving-intermediate-table-columns
        ->withPivot('jumlah_produksi', 'jumlah_bahanbaku_dipakai');
    }

    public function bahan_baku()
    {
        return $this->belongsToMany(BahanBaku::class, 'paving_has_bahan_baku')
        ->as('bahan_baku')
        ->withPivot('jumlah_paving_per_bahanbaku');
    }

    public function transaksi_jual()
    {
        return $this->belongsToMany(TransaksiJual::class, 'paving_transaksi_jual')
        ->as('transaksi_jual')
        ->withPivot('harga', 'qty', 'subtotal');
    }
}
