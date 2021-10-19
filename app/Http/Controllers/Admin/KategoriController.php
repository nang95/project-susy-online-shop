<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $kategori = Kategori::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $kategori->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $kategori = $kategori->paginate(10);
        $skipped = ($kategori->perPage() * $kategori->currentPage()) - $kategori->perPage();

        return view('apps.dashboard.admin.kategori.index')->with('kategori', $kategori)
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
        return view('apps.dashboard.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $kategori = $request->all();

        Kategori::create($kategori);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.kategori');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('apps.dashboard.admin.kategori.edit')->with('kategori', $kategori);
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
        $kategori = Kategori::findOrFail($request->id);

        $kategori->update($request->all());
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $kategori = Kategori::findOrFail($request->id);

        $kategori->delete();
        return redirect()->back();
    }
}
