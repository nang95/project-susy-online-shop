<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Intervention\Image\ImageManagerStatic as Image;
use Session;

class EventController extends Controller
{
    public function index(Request $request){
        $q_nama = $request->q_nama;
        $event = Event::orderBy('id', 'desc');

        if (!empty($q_nama)) {
            $event->where('nama', 'LIKE', '%'.$event.'%');
        }

        $event = $event->paginate(10);
        $skipped = ($event->perPage() * $event->currentPage()) - $event->perPage();

        return view('apps.dashboard.admin.event.index')->with('q_nama', $q_nama)
                                                 ->with('event', $event)
                                                 ->with('skipped', $skipped);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.dashboard.admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $event = $request->all();

        $image = $request->file('foto');
        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();

        $destinationPath = 'foto_produk';
        $image->move($destinationPath, $file_name);

        $image_resize = Image::make('foto_produk/'. $file_name);   

        $event['foto'] = $file_name;

        Event::create($event);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.event');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('apps.dashboard.admin.event.edit')->with('event', $event);
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
        $event = Event::findOrFail($request->id);

        $data = $request->all();
        $data['foto'] = $event->foto;

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

        $event->update($data);
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $event = Event::findOrFail($request->id);

        $event->delete();
        return redirect()->back();
    }
}
