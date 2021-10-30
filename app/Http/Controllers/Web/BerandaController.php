<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Pelanggan, PelangganKeranjang, Pemesanan, Kategori, Carousel, Produk};

class BerandaController extends Controller
{
    public function index(Request $request){
        $contact = Contact::first();
        $kategori = Kategori::limit(5)->get();
        $produk = Produk::whereIn('id', function($query){
            $query->select('produk_id')->from('variasis');
        })->limit(6)->get();
        
        $carousel = Carousel::get();

        return view('apps.web.index')->with('carousel', $carousel)
                                     ->with('contact', $contact)
                                     ->with('kategori', $kategori)
                                     ->with('produk', $produk);
    }
}
