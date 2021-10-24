<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Kategori, Carousel, Event, Produk};

class BerandaController extends Controller
{
    public function index(Request $request){
        $contact = Contact::first();
        $kategori = Kategori::limit(5)->get();
        $produk = Produk::limit(5)->get();
        $carousel = Carousel::get();
        $event = Event::where('tanggal_dari', '<=', date('Y-m-d'))
                      ->where('tanggal_sampai', '>=', date('Y-m-d'))
                      ->first();

        return view('apps.web.index')->with('carousel', $carousel)
                                     ->with('contact', $contact)
                                     ->with('kategori', $kategori)
                                     ->with('event', $event)
                                     ->with('produk', $produk);
    }
}
