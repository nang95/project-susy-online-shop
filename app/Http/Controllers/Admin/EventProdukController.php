<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Event, EventProduk, Produk};
use Session;

class EventProdukController extends Controller
{
    public function index(Event $event, Request $request){
        $q_nama = $request->q_nama;
        $event_produk = EventProduk::orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $event_produk->where('nama', 'LIKE', '%'.$event_produk.'%');
        }

        $event_produk = $event_produk->paginate(10);
        $skipped = ($event_produk->perPage() * $event_produk->currentPage()) - $event_produk->perPage();

        return view('apps.dashboard.admin.event-produk.index')->with('q_nama', $q_nama)
                                                              ->with('event_produk', $event_produk)
                                                              ->with('event', $event)
                                                              ->with('skipped', $skipped);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $produk = Produk::whereNotIn('id', function($query){
            $query->select('produk_id')->from('event_produks');
        })->get();

        return view('apps.dashboard.admin.event-produk.create')->with('event', $event)
                                                               ->with('produk', $produk);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $event_produk = $request->all();

        EventProduk::create($event_produk);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.event.produk', $request->event_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventProduk $event_produk, Event $event)
    {
        $produk = Produk::whereNotIn('id', function($query){
            $query->select('produk_id')->from('event_produks');
        })->get();
        
        return view('apps.dashboard.admin.event-produk.edit')->with('event', $event)
                                                             ->with('event_produk', $event_produk)
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
        $event_produk = EventProduk::findOrFail($request->id);

        $data = $request->all();
        $event_produk->update($data);
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.event.produk', $request->event_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $event_produk = EventProduk::findOrFail($request->id);

        $event_produk->delete();
        return redirect()->back();
    }
}
