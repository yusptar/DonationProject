<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offline;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use PDF;

class OfflineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		$emps = Offline::all();
        return view('manage_admin.offline_manage', compact('emps'));
    }
    // public function index_table()
    // {
    //     return view('manage_admin.pengasuh_manage');
    // }
    public function fetchAll() {
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
                <th>Pesan</th>
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
					
					<p><a href="nota/'.$emp->id.' " id="' . $emp->id . '" class="btn btn-danger text-white" data-bs-target="#"><i class="fa fa-print"></i></a></p>
					
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

    public function store(Request $request)
    {  
        // $file = $request->file('image');
		// $fileName = time() . '.' . $file->getClientOriginalExtension();
		// $file->storeAs('public/images', $fileName);

		$empData = ['nama' => $request->nama, 'nominal' => $request->nominal, 'nohp' => $request->nohp, 'doa' => $request->doa];
		Offline::create($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function edit(Request $request)
    {   
        $id = $request->id;
		$emp = Offline::find($id);
		return response()->json($emp);
    }

    public function update(Request $request) {
		// $fileName = '';
		$emp = Offline::find($request->emp_id);
		// if ($request->hasFile('image')) {
		// 	$file = $request->file('image');
		// 	$fileName = time() . '.' . $file->getClientOriginalExtension();
		// 	$file->storeAs('public/images', $fileName);
		// 	if ($emp->image) {
		// 		Storage::delete('public/images/' . $emp->image);
		// 	}
		// } else {
		// 	$fileName = $request->emp_image;
		// }

		$empData = ['nama' => $request->nama, 'nominal' => $request->nominal, 'nohp' => $request->nohp, 'doa' => $request->doa];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    public function delete(Request $request) {
		$id = $request->id;
		$emp = Offline::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			Offline::destroy($id);
		}
	}

	public function view(Request $request)
    {   
        $id = $request->id;
		$emp = Offline::find($id);
		return response()->json($emp);
    }

	public function cetak_nota($id)
    {
        $offline = Offline::find($id);
    	$pdf = PDF::loadview('nota',['offline'=>$offline]);
    	return $pdf->download('nota.pdf');
	}
}