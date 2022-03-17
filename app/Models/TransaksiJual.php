<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiJual extends Model
{
    use HasFactory;

    protected $table = 'transaksi_jual';
    public $timestamps = false;
    protected $guarded = [];

    public function getTglTransaksiAttribute($value)
    {
        if (Str::contains(url()->current(), ['edit', 'create'])) {
            return $value;
        }

        return Carbon::parse($value)->translatedFormat('d F Y');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function paving()
    {
        return $this->belongsToMany(Paving::class, 'keranjang_jual')
            ->as('paving')
            ->withPivot('id', 'qty', 'subtotal');
    }
}
