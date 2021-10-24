<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Intervention\Image\ImageManagerStatic as Image;
use Session;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $carousel = Carousel::orderBy('title', 'asc');

        if (!empty($q_nama)) {
            $carousel->where('title', 'LIKE', '%'.$q_nama.'%');
        }

        $carousel = $carousel->paginate(10);
        $skipped = ($carousel->perPage() * $carousel->currentPage()) - $carousel->perPage();

        return view('apps.dashboard.admin.carousel.index')->with('carousel', $carousel)
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
        return view('apps.dashboard.admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $carousel = $request->all();

        $image = $request->file('image');
        $file_name = $image->getClientOriginalName();
        $file_size = $image->getSize();
        $file_type = $image->getClientOriginalExtension();

        $destinationPath = 'foto_carousel';
        $image->move($destinationPath, $file_name);

        $image_resize = Image::make('foto_carousel/'. $file_name);   

        $carousel['image'] = $file_name;
        $carousel = Carousel::create($carousel);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.carousel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('apps.dashboard.admin.carousel.edit')->with('corousel', $carousel)
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
        $carousel = Carousel::findOrFail($request->id);

        $data['foto'] = $carousel->foto;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file_name = $image->getClientOriginalName();
            $file_size = $image->getSize();
            $file_type = $image->getClientOriginalExtension();

            $data['foto'] = $file_name;
    
            $destinationPath = 'foto_carousel';
            $image->move($destinationPath, $file_name);
    
            $image_resize = Image::make('foto_carousel/'. $file_name);   
        }

        $carousel->update($data);
        
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
        $carousel = Carousel::findOrFail($request->id);

        $carousel->delete();
        return redirect()->back();
    }
}
