<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // set index page view
	public function index() {
		return view('manage_admin.kegiatan_manage');
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Kegiatan::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered data-table" id="laravel_datatable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td><img src="storage/images/' . $emp->image . '" width="100" height="100" src="https://via.placeholder.com/150"></td>
                <td>' . $emp->title . '</td>
                <td>' . $emp->description . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editKegiatanModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
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

		$empData = ['title' => $request->title, 'description' => $request->description, 'image' => $fileName];
		Kegiatan::create($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function edit($id)
    {   
        $id = $request->id;
		$emp = Kegiatan::find($id);
		return response()->json($emp);
    }

    public function update(Request $request) {
		$fileName = '';
		$emp = Kegiatan::find($request->emp_id);
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

		$empData = ['title' => $request->title, 'description' => $request->description, 'image' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    public function delete(Request $request) {
		$id = $request->id;
		$emp = Kegiatan::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			Kegiatan::destroy($id);
		}
	}
}
