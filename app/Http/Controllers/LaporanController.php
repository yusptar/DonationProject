<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use App\Models\Offline;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('manage_admin.laporan_manage');
    }
    public function cetak_pdf()
    {
        $online = Donation::all();
        $total = Donation::latest()->sum('nominal');
        $offline = Offline::all();
        $totalo = Offline::latest()->sum('nominal');
        $total_semua = $total + $totalo;
 
    	$pdf = PDF::loadview('rekap',['online'=>$online, 'total'=>$total, 'offline'=>$offline, 'totalo'=>$totalo, 'total_semua'=>$total_semua]);
    	return $pdf->download('laporan-donasi.pdf');
        // return view('manage_admin.laporan_manage');
    }
}


