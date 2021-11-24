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
        return $this->belongsToMany(Paving::class, 'bahan_baku_paving')
        // https://laravel.com/docs/8.x/eloquent-relationships#customizing-the-pivot-attribute-name
        ->as('paving')
        // https://laravel.com/docs/8.x/eloquent-relationships#retrieving-intermediate-table-columns
        ->withPivot('semen', 'abu_batu');
    }

    public function transaksi_beli()
    {
        return $this->belongsToMany(TransaksiBeli::class, 'keranjang_beli')
        ->as('transaksi_beli')
        ->withPivot('qty', 'subtotal');
    }
}
