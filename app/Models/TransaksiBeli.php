<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiBeli extends Model
{
    use HasFactory;

    protected $table = 'transaksi_beli';
    public $timestamps = false;
    protected $guarded = [];

    public function getTglTransaksiAttribute($value)
    {
        if (Str::contains(url()->current(), ['edit', 'create'])) {
            return $value;
        }

        return Carbon::parse($value)->translatedFormat('d F Y');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function bahan_baku()
    {
        return $this->belongsToMany(BahanBaku::class, 'keranjang_beli')
            ->as('bahan_baku')
            ->withPivot('id', 'qty', 'subtotal');
    }
}
