<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Session;

class PemesananController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $pemesanan = Pemesanan::orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $pemesanan->whereHas('pelanggan', function($query) use($q_nama){
                $query->where('nama', 'LIKE', '%'.$q_nama.'%');
            });
        }

        $pemesanan = $pemesanan->paginate(10);
        $skipped = ($pemesanan->perPage() * $pemesanan->currentPage()) - $pemesanan->perPage();

        return view('apps.dashboard.admin.pemesanan.index')->with('pemesanan', $pemesanan)
                                                           ->with('skipped', $skipped)
                                                           ->with('q_nama', $q_nama);
    }

    public function edit(Pemesanan $pemesanan){
        return view('apps.dashboard.admin.pemesanan.edit')->with('pemesanan', $pemesanan);
    }

    public function update(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id);

        $pemesanan->update($request->all());
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.pemesanan');
    }

    public function delete(Request $request){
        $pemesanan = Pemesanan::findOrFail($request->id);

        $pemesanan->delete();
        return redirect()->back();
    }
}
