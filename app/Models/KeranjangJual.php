<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangJual extends Model
{
    use HasFactory;

    protected $table = 'keranjang_jual';
    public $timestamps = false;
    protected $guarded = [];
}
