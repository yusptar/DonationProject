<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
		return view('manage_admin.berita_manage');
	}

    public function fetchAll() {
		$emps = Berita::all();
		$output = '';
		$numbering = 1;
		if ($emps->count() > 0) {
			$output .= '<table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td width="5px">' . $numbering++ . '</td>
                <td><img src="storage/images/' . $emp->image . '" width="100" height="100" src="https://via.placeholder.com/150"></td>
                <td>' . $emp->title . '</td>
                <td>' . $emp->description . '</td>
                <td>' . $emp->created_at . '</td>
                <td>' . $emp->updated_at . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="edit btn btn-primary btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editKegiatanModal"><i class="bi-pencil-square h4"></i>Edit</a>

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

		$empData = ['title' => $request->title, 'description' => $request->description, 'image' => $fileName];
		Berita::create($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function edit(Request $request)
    {   
        $id = $request->id;
		$emp = Berita::find($id);
		return response()->json($emp);
    }

    public function update(Request $request) {
		$fileName = '';
		$emp = Berita::find($request->emp_id);
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
		$emp = Berita::find($id);
		if (Storage::delete('public/images/' . $emp->image)) {
			Berita::destroy($id);
		}
	}


}
