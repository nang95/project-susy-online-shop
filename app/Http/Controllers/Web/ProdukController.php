<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Produk, Contact, Variasi, Pelanggan, PelangganKeranjang, Pemesanan, Kategori};

class ProdukController extends Controller
{
    public function index(Request $request){
        $kategori_ids = $request->kategori_id;
        $harga_dari = $request->harga_dari;
        $harga_sampai = $request->harga_sampai;

        $kategori = Kategori::get();
        $contact = Contact::first();
        $produk = Produk::whereIn('id', function($query){
            $query->select('produk_id')->from('variasis');
        })->orderBy('id', 'desc');

        if (!empty($kategori_ids)) {
            $produk->whereIn('id', function($query) use($kategori_ids){
                $query->select('produk_id')->from('kategori_produk')->whereIn('kategori_id', $kategori_ids);
            });
        }

        if (!empty($harga_dari) && !empty($harga_sampai)) {
            $produk->where('harga', '>=', $harga_dari)
                   ->where('harga', '<=', $harga_sampai);
        }

        $produk = $produk->get();

        return view('apps.web.produk')->with('kategori', $kategori)
                                      ->with('produk', $produk)
                                      ->with('kategori_ids', $kategori_ids)
                                      ->with('harga_dari', $harga_dari)
                                      ->with('harga_sampai', $harga_sampai)
                                      ->with('contact', $contact);
    }

    public function detail(Produk $produk){
        $variasi = Variasi::where('produk_id', $produk->id)->where('stok', '>=', 1)->get();
        $variasi_galeri = Variasi::groupBy('nama')->where('produk_id', $produk->id)->get();
        $contact = Contact::first();

        return view('apps.web.detail_produk')->with('produk', $produk)
                                             ->with('variasi', $variasi)
                                             ->with('variasi_galeri', $variasi_galeri)
                                             ->with('contact', $contact);
    }
}
