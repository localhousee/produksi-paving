<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';
    public $timestamps = false;
    protected $guarded = [];

    public function paving()
    {
        return $this->belongsToMany(Paving::class, 'bahan_baku_paving')
            ->as('paving')
            ->withPivot('semen', 'abu_batu');
    }

    public function transaksi_beli()
    {
        return $this->belongsToMany(TransaksiBeli::class, 'keranjang_beli')
            ->as('transaksi_beli')
            ->withPivot('qty', 'subtotal');
    }
}
