<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoKegiatan;
use DataTables;

class FotoKegiatanController extends Controller
{

    public function index(Request $request)
    {
   
        $fotokegiatan = FotoKegiatan::latest()->get();
        
        if ($request->ajax()) {
            $data = FotoKegiatan::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editFoto">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteFoto">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('manage_admin.fotokegiatan_management',compact('fotokegiatan'));
    }
     
 
    public function store(Request $request)
    {
        FotoKegiatan::updateOrCreate(['id' => $request->fotokegiatan_id],
                ['title' => $request->title, 'author' => $request->author]);        
   
        return response()->json(['success'=>'Foto kegiatan saved successfully.']);
    }
   
    public function edit($id)
    {
        $fotokegiatan = FotoKegiatan::find($id);
        return response()->json($fotokegiatan);
    }
  
    public function destroy($id)
    {
        FotoKegiatan::find($id)->delete();   
        return response()->json(['success'=>'FotoKegiatan deleted successfully.']);
    }
}
