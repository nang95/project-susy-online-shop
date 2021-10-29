<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailPemesanan(){
        return $this->hasMany(DetailPemesanan::class);
    }

    public function getStatus($status){
        switch ($status) {
            case 0:
                return "Sedang Dikemas";
                break;
            case 1:
                return "Sedang Dikirim";
                break;
            case 2:
                return "Sudah Diterima";
                break;
        }
    }
}
