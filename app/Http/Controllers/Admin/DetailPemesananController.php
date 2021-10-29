<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pemesanan, DetailPemesanan};

class DetailPemesananController extends Controller
{
    public function index(Pemesanan $pemesanan, Request $request){
        $q_nama = $request->q_nama;
        $detail_pemesanan = DetailPemesanan::orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $detail_pemesanan->whereHas('pelanggan', function($query) use($q_nama){
                $query->where('nama', 'LIKE', '%'.$q_nama.'%');
            });
        }

        $detail_pemesanan = $detail_pemesanan->paginate(10);
        $skipped = ($detail_pemesanan->perPage() * $detail_pemesanan->currentPage()) - $detail_pemesanan->perPage();

        return view('apps.dashboard.admin.detail_pemesanan.index')->with('pemesanan', $pemesanan)
                                                           ->with('detail_pemesanan', $detail_pemesanan)
                                                           ->with('skipped', $skipped)
                                                           ->with('q_nama', $q_nama);
    }

    public function edit(DetailPemesanan $detail_pemesanan, Pemesanan $pemesanan){
        return view('apps.dashboard.detail_pemesanan.edit')->with('detail_pemesanan', $detail_pemesanan)
                                                           ->with('pemesanan', $pemesanan);
    }

    public function update(Request $request){
        $detail_pemesanan = DetailPemesanan::findOrFail($request->id);
        
        $detail_pemesanan->update([
            'status' => $request->status,
        ]);

    }

    public function delete(Request $request){
        $detail_pemesanan = DetailPemesanan::findOrFail($request->id);

        $detail_pemesanan->delete();

        return redirect()->back();
    }
}
