<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $kontak = Contact::first();

        if ($kontak == null) {
            $kontak = Contact::create([
                'no_telfon' => '082361639595',
                'instagram' => '@jhon_doe',
                'facebook' => '998JhonD2'
            ]);
        }

        return view('apps.dashboard.admin.kontak.index')->with('kontak', $kontak);
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
        $kontak = Contact::findOrFail($request->id);

        $kontak->update($request->all());
        
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->back();
    }
}
