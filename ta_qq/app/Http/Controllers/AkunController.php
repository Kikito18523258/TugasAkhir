<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AkunController extends Controller
{
    public function index()
    { 
        $user = User::all();
        return view('admin.daftarAkun',compact('user'));
    }

    public function destroy($id)
    {
        $userd = User::FindOrFail($id);
        $userd -> delete();
        return redirect('/daftarAkun')->with('success', 'Data berhasil dihapus');
    } 
}
