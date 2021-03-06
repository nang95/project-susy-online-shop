<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Produk, Variasi};
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class VariasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk, Request $request)
    {
        $q_nama = $request->q_nama;
        $variasi = Variasi::where('produk_id', $produk->id)->orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $variasi->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $variasi = $variasi->paginate(10);
        $skipped = ($variasi->perPage() * $variasi->currentPage()) - $variasi->perPage();

        return view('apps.dashboard.admin.variasi.index')->with('variasi', $variasi)
                                                         ->with('q_nama', $q_nama)
                                                         ->with('produk', $produk)
                                                         ->with('skipped', $skipped);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produk $produk)
    {
        return view('apps.dashboard.admin.variasi.create')->with('produk', $produk);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $variasi = $request->all();

        $image = $request->file('foto');
        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();

        $destinationPath = 'foto_produk';
        $image->move($destinationPath, $file_name);

        $image_resize = Image::make('foto_produk/'. $file_name);   

        $variasi['foto'] = $file_name;

        Variasi::create($variasi);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.produk.variasi', $request->produk_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Variasi $variasi, Produk $produk)
    {
        return view('apps.dashboard.admin.variasi.edit')->with('variasi', $variasi)
                                                        ->with('produk', $produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $variasi = Variasi::findOrFail($request->id);

        $data = $request->all();
        $data['foto'] = $variasi->foto;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file_name = $image->getClientOriginalName();
            $file_size = $image->getSize();
            $file_type = $image->getClientOriginalExtension();

            $data['foto'] = $file_name;
    
            $destinationPath = 'foto_produk';
            $image->move($destinationPath, $file_name);
    
            $image_resize = Image::make('foto_produk/'. $file_name);   
        }

        $variasi->update($data);
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.produk.variasi', $request->produk_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $variasi = Variasi::findOrFail($request->id);

        $variasi->delete();
        return redirect()->back();
    }
}
