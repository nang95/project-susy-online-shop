<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pelanggan, User, Role};
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        if (!empty(auth()->user()->id)) {
            return redirect()->back();
        }
        
        return view('apps.auth.register');
    }
    
    public function insert(Request $request){
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user = User::findOrFail($user->id);
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telfon' => $request->no_telfon,
            'user_id' => $user->id
        ]);

        $role = Role::where('nama', 'pelanggan')->first();

        // attach & detach
        $user->roles()->detach($role->id);
        $user->roles()->attach($role->id);

        return redirect()->route('login');
    }
}
