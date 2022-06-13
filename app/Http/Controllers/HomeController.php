<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Santri;
use App\Models\Berita;
use App\Models\Donation;

class HomeController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $berita = Berita::all();
        $donasi = Donation::all();
        $jumlah_donatur = User::latest()->where('roles', 'Donatur')->count();
        $jumlah_santri = Santri::latest()->count();
        $jumlah_pengasuh = User::latest()->where('roles', 'Pengasuh')->count();
        $donasi_terkumpul = Donation::latest()->sum('gross_amount');
        return view('home', 
            compact('kegiatan', 'berita', 'jumlah_donatur', 
                    'jumlah_santri', 'jumlah_pengasuh', 'donasi_terkumpul',
                    'donasi'));
    }


    public function index_detail_kegiatan($slug)
    {
        $this->data['kegiatan'] = Kegiatan::where('slug','=',$slug)->firstOrFail();
        return view('detail-kegiatan', $this->data);
    }

    public function index_detail_berita($slug)
    {
        $this->data['berita'] = Berita::where('slug','=',$slug)->firstOrFail();
        return view('detail-berita', $this->data);
    }


    
}
