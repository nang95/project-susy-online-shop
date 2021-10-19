<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $pelanggan = Pelanggan::orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $pelanggan->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $pelanggan = $pelanggan->paginate(10);
        $skipped = ($pelanggan->perPage() * $pelanggan->currentPage()) - $pelanggan->perPage();

        return view('apps.dashboard.admin.pelanggan.index')->with('pelanggan', $pelanggan)
                                                         ->with('q_nama', $q_nama)
                                                         ->with('skipped', $skipped);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->id);

        $pelanggan->delete();
        return redirect()->back();
    }
}
