<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, PelangganKeranjang, Pelanggan, Pemesanan, DetailPemesanan};

class CheckoutController extends Controller
{
    public function index(Request $request){
        $contact = Contact::first();
        $product_collect = $request->product_collect;
        $keranjang = PelangganKeranjang::whereIn('id', explode(';', $product_collect))->get();
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();

        return view('apps.web.checkout')->with('keranjang', $keranjang)
                                        ->with('pelanggan', $pelanggan)
                                        ->with('contact', $contact);
    }

    public function insert(Request $request){
        $keranjang_ids = $request->keranjang_ids;

        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();

        $pemesanan = Pemesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'tanggal_pemesanan' => date('Y-m-d'),
            'total_pembayaran' => $request->total_pembayaran
        ]);

        foreach ($keranjang_ids as $key => $item) {
            $keranjang = PelangganKeranjang::findOrFail($item);

            $detail_pemesanan = DetailPemesanan::create([
                'pemesanan_id' => $pemesanan->id,
                'variasi_id' => $keranjang->variasi_id,
                'jumlah' => $keranjang->jumlah,
            ]);
            
            $keranjang->delete();
        }
    
        return redirect()->route('toko./');
    }
}
