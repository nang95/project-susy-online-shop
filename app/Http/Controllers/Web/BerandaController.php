<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Pelanggan, PelangganKeranjang, Pemesanan, Kategori, Carousel, Event, Produk};

class BerandaController extends Controller
{
    public function index(Request $request){
        $contact = Contact::first();
        $kategori = Kategori::limit(5)->get();
        $produk = Produk::limit(6)->get();
        $carousel = Carousel::get();
        $event = Event::where('tanggal_dari', '<=', date('Y-m-d'))
                      ->where('tanggal_sampai', '>=', date('Y-m-d'))
                      ->first();
                      
        $top_event = Event::where('tanggal_dari', '<=', date('Y-m-d'))
                          ->where('tanggal_sampai', '>=', date('Y-m-d'))
                          ->limit(2)
                          ->get();

        return view('apps.web.index')->with('carousel', $carousel)
                                     ->with('contact', $contact)
                                     ->with('kategori', $kategori)
                                     ->with('event', $event)
                                     ->with('top_event', $top_event)
                                     ->with('produk', $produk);
    }
}
