<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pemesanan, DetailPemesanan, Contact};

class DetailPemesananController extends Controller
{
    public function index(Request $request, Pemesanan $pemesanan){
        $contact = Contact::first();
        $detail_pemesanan = DetailPemesanan::where('pemesanan_id', $pemesanan->id)->get();

        return view('apps.web.detail_pemesanan')->with('detail_pemesanan', $detail_pemesanan)
                                                ->with('pemesanan', $pemesanan)
                                                ->with('contact', $contact);        
    }
}
