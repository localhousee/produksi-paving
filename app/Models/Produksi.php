<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';
    public $timestamps = false;
    protected $guarded = [];

    public function getTanggalAttribute($value)
    {
        if (str_contains(url()->current(), 'edit')) {
            return $value;
        }
        return Carbon::parse($value)->translatedFormat('d F Y');
    }

    public function paving()
    {
        return $this->belongsToMany(Paving::class, 'produksi_paving')
            ->as('paving')
            ->withPivot('jumlah_produksi');
    }
}
