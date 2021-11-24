<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangBeli extends Model
{
    use HasFactory;

    protected $table = 'keranjang_beli';
    public $timestamps = false;
    protected $guarded = [];
}
