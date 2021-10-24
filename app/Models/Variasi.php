<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function pelangganKeranjang(){
        return $this->hasMany(PelangganKeranjang::class);
    }
}
