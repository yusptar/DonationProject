<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Santri;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PengasuhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_santri = Santri::all();
        return view('pengasuh.pengasuh', compact('data_santri'));
    }
    public function index_table()
    {
        return view('manage_admin.pengasuh_manage');
    }
    public function fetchAll() {
		$emps = User::all()->where('roles', 'Pengasuh');
		$output = '';
		$numbering = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Name</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No. Hp</th>
                <th>Instansi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td><img src="storage/images/' . $emp->image . '" width="100" height="100" src="https://via.placeholder.com/150"></td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->alamat . '</td>
                <td>' . $emp->nohp . '</td>
                <td>' . $emp->instansi . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="edit btn btn-primary btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editPengasuhModal"><i class="bi-pencil-square h4"></i>Edit</a>

                  <a href="#" id="' . $emp->id . '" class="btn btn-danger btn-sm deleteIcon"><i class="bi-trash h4"></i>Delete</a>

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
        $file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$empData = ['name' => $request->name, 'email' => $request->email, 'alamat' => $request->alamat, 'nohp' => $request->nohp, 'instansi' => $request->instansi, 'image' => $fileName];
		User::create($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function edit(Request $request)
    {   
        $id = $request->id;
		$emp = User::find($id);
		return response()->json($emp);
    }

    public function update(Request $request) {
		$fileName = '';
		$emp = User::find($request->emp_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->image) {
				Storage::delete('public/images/' . $emp->image);
			}
		} else {
			$fileName = $request->emp_image;
		}

		$empData = ['name' => $request->name, 'email' => $request->email, 'alamat' => $request->alamat, 'nohp' => $request->nohp, 'instansi' => $request->instansi, 'image' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    public function delete(Request $request) {
		$id = $request->id;
		$emp = User::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			User::destroy($id);
		}
	}
}
