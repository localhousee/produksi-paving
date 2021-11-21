<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBeli extends Model
{
    use HasFactory;

    // https://laravel.com/docs/8.x/eloquent#table-names
    // https://laravel.com/docs/8.x/eloquent#timestamps
    // https://laravel.com/docs/8.x/eloquent#allowing-mass-assignment
    protected $table = 'transaksi_beli';
    public $timestamps = false;
    protected $guarded = [];

    public function supplier()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
        return $this->belongsTo(Supplier::class);
    }

    public function bahan_baku()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
        return $this->belongsToMany(BahanBaku::class, 'bahan_baku_transaksi_beli')
        // https://laravel.com/docs/8.x/eloquent-relationships#customizing-the-pivot-attribute-name
        ->as('bahan_baku')
        // https://laravel.com/docs/8.x/eloquent-relationships#retrieving-intermediate-table-columns
        ->withPivot('harga', 'qty', 'subtotal');
    }
}
