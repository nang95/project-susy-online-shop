<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Produk, PelangganKeranjang, Pemesanan, Pelanggan, Kategori};

class PromoController extends Controller
{
    public function index(Request $request){
        $nama = $request->nama;
        $kategori_ids = $request->kategori_id;
        $harga_dari = $request->harga_dari;
        $harga_sampai = $request->harga_sampai;

        $kategori = Kategori::get();
        $contact = Contact::first();
        $produk = Produk::whereIn('id', function($query){
            $query->select('produk_id')->from('event_produks')->whereIn('event_id', function($event){
                $event->select('id')->from('events')->where('tanggal_dari', '<=', date('Y-m-d'))
                                                    ->where('tanggal_sampai', '>=', date('Y-m-d'));
            });
        });

        if (!empty($kategori_ids)) {
            $produk->whereIn('id', function($query) use($kategori_ids){
                $query->select('produk_id')->from('kategori_produk')->whereIn('kategori_id', $kategori_ids);
            });
        }

        if (!empty($nama)) {
            $produk->whereIn('id', function($query) use($nama){
                $query->select('produk_id')->from('event_produks')->whereIn('event_id', function($event) use($nama){
                    $event->select('id')->from('events')->where('nama', 'LIKE', '%'.$nama.'%');
                });
            });
        }

        if (!empty($harga_dari) && !empty($harga_sampai)) {
            $produk->where('harga', '>=', $harga_dari)
                   ->where('harga', '<=', $harga_sampai);
        }

        $produk = $produk->paginate(30);
        $skipped = ($produk->perPage() * $produk->currentPage()) - $produk->perPage();


        return view('apps.web.promo')->with('produk', $produk)
                                     ->with('kategori', $kategori)
                                     ->with('kategori_ids', $kategori_ids)
                                     ->with('harga_dari', $harga_dari)
                                     ->with('harga_sampai', $harga_sampai)
                                     ->with('contact', $contact)
                                     ->with('nama', $nama)
                                     ->with('skipped', $skipped);        
    }
}
