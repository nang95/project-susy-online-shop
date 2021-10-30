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

        return view('apps.dashboard.admin.dashboard')->with('produk', $produk)
                                                     ->with('pelanggan', $pelanggan)
                                                     ->with('pemesanan', $pemesanan);
    }
}
