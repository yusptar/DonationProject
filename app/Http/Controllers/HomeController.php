<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Santri;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $berita = Berita::all();
        $jumlah_donatur = User::latest()->where('roles', 'Donatur')->count();
        $jumlah_santri = Santri::latest()->count();
        $jumlah_pengasuh = User::latest()->where('roles', 'Pengasuh')->count();
        return view('home', compact('kegiatan', 'berita', 'jumlah_donatur', 'jumlah_santri', 'jumlah_pengasuh'));
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
