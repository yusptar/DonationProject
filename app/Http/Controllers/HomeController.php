<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $berita = Berita::all();
        return view('home', compact('kegiatan', 'berita'));
    }

    public function index_detail_kegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('detail-kegiatan', ['kegiatan'=>$kegiatan, 'id'=>$id]);
    }

    public function index_detail_berita($id)
    {
        $berita = Berita::find($id);
        return view('detail-berita', ['berita'=>$berita, 'id'=>$id]);
    }


    
}
