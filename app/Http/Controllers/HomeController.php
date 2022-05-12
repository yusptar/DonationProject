<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('home', compact('kegiatan'));
    }

    public function index_detail_kegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('detail-kegiatan', ['kegiatan'=>$kegiatan, 'id'=>$id]);
    }


    
}
