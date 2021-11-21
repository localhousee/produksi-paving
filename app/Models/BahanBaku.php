<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    // https://laravel.com/docs/8.x/eloquent#table-names
    // https://laravel.com/docs/8.x/eloquent#timestamps
    // https://laravel.com/docs/8.x/eloquent#allowing-mass-assignment
    protected $table = 'bahan_baku';
    public $timestamps = false;
    protected $guarded = [];

    public function paving()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
        return $this->belongsToMany(Paving::class, 'paving_has_bahan_baku')
        // https://laravel.com/docs/8.x/eloquent-relationships#customizing-the-pivot-attribute-name
        ->as('paving')
        // https://laravel.com/docs/8.x/eloquent-relationships#retrieving-intermediate-table-columns
        ->withPivot('jumlah_paving_per_bahanbaku');
    }

    public function transaksi_beli()
    {
        return $this->belongsToMany(TransaksiBeli::class, 'bahan_baku_transaksi_beli')
        ->as('transaksi_beli')
        ->withPivot('harga', 'qty', 'subtotal');
    }
}
