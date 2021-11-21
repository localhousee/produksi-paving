<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // https://laravel.com/docs/8.x/eloquent#table-names
    // https://laravel.com/docs/8.x/eloquent#timestamps
    // https://laravel.com/docs/8.x/eloquent#allowing-mass-assignment
    protected $table = 'supplier';
    public $timestamps = false;
    protected $guarded = [];

    public function transaksi_beli()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#one-to-many
        return $this->hasMany(TransaksiBeli::class);
    }
}
