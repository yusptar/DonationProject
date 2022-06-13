<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use App\Models\Offline;

class LaporanController extends Controller
{
    public function index()
    {
        return view('manage_admin.laporan_manage');
    }

    public function fetchAll_online() {
		$user = User::where('id', Auth::user()->id)->first();
    $donasi = Donation::all();
		$output = '';
		$numbering = 1;
		if ($donasi->count() > 0) {
			$output .= '<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Status</th>
                <th>Nama Donatur</th>
                <th>Email Donatur</th>
                <th>Nomor Hp</th>
                <th>Nominal</th>
                <th>Pesan</th>
                <th>Payment Code</th>
                <th>Download Nota</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($donasi as $donation) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td>' . $donation->status . '</td>
                <td>' . $donation->donatur_name . '</td>
                <td>' . $donation->donatur_email . '</td>
                <td>' . $donation->donatur_phone . '</td>
                <td>' . $donation->nominal . '</td>
                <td>' . $donation->message . '</td>
                <td>' . $donation->payment_code . '</td>
                <td>' . $donation->pdf_url . '</td>
                <td>
                <a href="#" id="' . $donation->id . '" class="edit btn btn-primary btn-sm viewIcon" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="bi-pencil-square h4"></i>View</a>

                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

    public function fetchAll_offline() {
		$emps = Offline::all();
		$output = '';
		$numbering = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-responsive table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nominal</th>
				<th>No. Hp</th>
                <th>Doa</th>
				<th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td>' . $emp->nama . '</td>
                <td>' . $emp->nominal . '</td>
				<td>' . $emp->nohp . '</td>
                <td>' . $emp->doa . '</td>
                <td>
					
					<a href="#" id="' . $emp->id . '" class="edit btn btn-primary btn-sm viewIcon" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="bi-pencil-square h4"></i>View</a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}


}

