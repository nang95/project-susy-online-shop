<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Produk, Kategori};
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $produk = Produk::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $produk->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $produk = $produk->paginate(10);
        $skipped = ($produk->perPage() * $produk->currentPage()) - $produk->perPage();

        return view('apps.dashboard.admin.produk.index')->with('produk', $produk)
                                                          ->with('q_nama', $q_nama)
                                                          ->with('skipped', $skipped);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama', 'asc')->get();

        return view('apps.dashboard.admin.produk.create')->with('kategori', $kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $produk = $request->all();

        $image = $request->file('foto');
        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();

        $destinationPath = 'foto_produk';
        $image->move($destinationPath, $file_name);

        $image_resize = Image::make('foto_produk/'. $file_name);   

        $produk['foto'] = $file_name;
        $produk = Produk::create($produk);
        $produk = Produk::findOrFail($produk->id);

        foreach ($request->kategori_ids as $key => $item) {
            $kategori = Kategori::findOrFail($item);
            // attach & detach
            $produk->kategori()->detach($kategori->id);
            $produk->kategori()->attach($kategori->id);
        }


        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.produk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::orderBy('nama', 'asc')->get();

        return view('apps.dashboard.admin.produk.edit')->with('produk', $produk)
                                                       ->with('kategori', $kategori);
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
        $data = $request->all();
        $produk = Produk::findOrFail($request->id);


        $data['foto'] = $produk->foto;

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

        // detach first
        $produk->kategori()->detach();
        foreach ($request->kategori_ids as $key => $item) {
            $kategori = Kategori::findOrFail($item);
            // attach & detach
            $produk->kategori()->detach($kategori->id);
            $produk->kategori()->attach($kategori->id);
        }

        $produk->update($data);
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $produk = Produk::findOrFail($request->id);

        $produk->delete();
        return redirect()->back();
    }
}
