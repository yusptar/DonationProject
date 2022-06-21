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
 
    	$pdf = PDF::loadview('rekap',['online'=>$online]);
    	return $pdf->download('laporan-donasi');
        // return view('manage_admin.laporan_manage');
    }
}


