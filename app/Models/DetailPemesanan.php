<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }

    public function variasi(){
        return $this->belongsTo(Variasi::class);
    }
}
