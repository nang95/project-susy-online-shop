<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact, Pelanggan, PelangganKeranjang, Pemesanan};

class TentangKamiController extends Controller
{
    public function index(){
        $contact = Contact::first();

        return view('apps.web.tentang_kami')->with('contact', $contact);
    }
}
