<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    // https://laravel.com/docs/8.x/eloquent#table-names
    // https://laravel.com/docs/8.x/eloquent#timestamps
    // https://laravel.com/docs/8.x/eloquent#allowing-mass-assignment
    protected $table = 'pembeli';
    public $timestamps = false;
    protected $guarded = [];

    public function transaksi_jual()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
        return $this->hasMany(TransaksiJual::class, 'pembeli_id');
    }
}
