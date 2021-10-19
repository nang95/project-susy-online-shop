<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Kategori, Produk};

class BerandaController extends Controller
{
    public function index(Request $request){
        $contact = Contact::first();
        $kategori = Kategori::limit(5)->get();
        $produk = Produk::limit(5)->get();

        return view('apps.web.index')->with('contact', $contact)
                                     ->with('kategori', $kategori)
                                     ->with('produk', $produk);
    }
}
