<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Produk, Pelanggan, Pemesanan};

class DashboardController extends Controller
{
    public function index(){
        $produk = Produk::count();
        $pelanggan = Pelanggan::count();
        $pemesanan= Pemesanan::count();
        $pemesanan_hari_ini = Pemesanan::where('tanggal_pemesanan', date('Y-m-d'))->limit(5)->get();
        $pemesanan_terkirim = Pemesanan::where('status', 2)->limit(5)->get();

        return view('apps.dashboard.admin.dashboard')->with('produk', $produk)
                                                     ->with('pelanggan', $pelanggan)
                                                     ->with('pemesanan_terkirim', $pemesanan_terkirim)
                                                     ->with('pemesanan_hari_ini', $pemesanan_hari_ini)
                                                     ->with('pemesanan', $pemesanan);
    }
}
