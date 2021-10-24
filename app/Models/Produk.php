<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsToMany(Kategori::class);
    }

    public function eventProduk(){
        return $this->belongsToMany(EventProduk::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function pelangganKeranjang(){
        return $this->hasMany(PelangganKeranjang::class);
    }

    public function variasi(){
        return $this->hasMany(Variasi::class);
    }
}
