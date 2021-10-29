<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pelanggan, Contact, PelangganKeranjang, Pemesanan};
class AkunController extends Controller
{
    public function index(){
        $contact = Contact::first();
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->first();

        return view('apps.web.akun')->with('pelanggan', $pelanggan)
                                    ->with('contact', $contact);
    }

    public function update(Request $request){
        $pelanggan = Pelanggan::findOrFail($request->id);

        $pelanggan->update($request->all());
        return redirect()->back();
    }
}
