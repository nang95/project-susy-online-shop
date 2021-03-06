<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganKeranjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function variasi(){
        return $this->belongsTo(Variasi::class);
    }
}
