<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pelanggan, Pemesanan, Contact, PelangganKeranjang};

class PemesananController extends Controller
{
    public function index(){
        $contact = Contact::first();
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();
        $pemesanan = Pemesanan::where('pelanggan_id', $pelanggan->id)->get();

        return view('apps.web.pemesanan')->with('pemesanan', $pemesanan)
                                         ->with('contact', $contact);        
    }

    public function konfirmasi(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id);

        $pemesanan->update([
            'status' => 2
        ]);

        return redirect()->back();
    }
}
