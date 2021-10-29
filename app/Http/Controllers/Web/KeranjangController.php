<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pelanggan, Contact, PelangganKeranjang, Pemesanan};

class KeranjangController extends Controller
{
    public function index(){
        $contact = Contact::first();
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();
        $keranjang = PelangganKeranjang::where('pelanggan_id', $pelanggan->id)->get();

        return view('apps.web.keranjang')->with('contact', $contact)
                                         ->with('keranjang', $keranjang);
    }

    public function insert(Request $request){
        if (empty(auth()->user()->id)) {
            return redirect()->route('login');
        }

        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();
        
        PelangganKeranjang::create([
            'variasi_id' => $request->variasi_id,
            'pelanggan_id' => $pelanggan->id,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('toko.keranjang');
    }

    public function delete(Request $request){
        $keranjang = PelangganKeranjang::findOrFail($request->id);

        $keranjang->delete();
        return redirect()->back();
    }
}
