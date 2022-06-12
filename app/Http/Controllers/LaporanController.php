<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use App\Models\Offline;

class LaporanController extends Controller
{
    public function index_table ()
    {
        return view('manage_admin.laporan_manage');
    }
}

