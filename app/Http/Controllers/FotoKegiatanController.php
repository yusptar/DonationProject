<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoKegiatan;
use DataTables;
use File;
use Storage;

class FotoKegiatanController extends Controller
{

    public function index(Request $request)
    {
   
        $fotokegiatan = FotoKegiatan::latest()->get();
        
        if ($request->ajax()) {
            $data = FotoKegiatan::latest()->get();
            // if($request->file('gambar')){
            //     $nama_gambar = $request->file('gambar')->store('gambars','public');
            // }
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
        request()->validate([
            'gambar' => 'gambar|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
     
        $fotokegiatanId = $request->fotokegiatan_id;
     
        $details = ['title' => $request->title, 'author' => $request->author];
     
        if ($files = $request->file('gambar')) {
            
           //delete old file
           \File::delete('public/images/'.$request->hidden_image);
         
           //insert new file
           $destinationPath = 'public/images/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $details['gambar'] = "$profileImage";
        }
        FotoKegiatan::updateOrCreate(['id' => $request->fotokegiatan_id], ['title' => $request->title, 'author' => $request->author, $details],
        );        
   
        return response()->json(['success'=>'Foto kegiatan saved successfully.']);
    }
   
    public function edit($id)
    {
        // $fotokegiatan = FotoKegiatan::find($id);
        // return response()->json($fotokegiatan);

        $where = array('id' => $id);
        $fotokegiatan  = FotoKegiatan::where($where)->first();
  
        return Response::json($fotokegiatan);
    }
  
    public function destroy($id)
    {
        // FotoKegiatan::find($id)->delete();   
        // return response()->json(['success'=>'FotoKegiatan deleted successfully.']);
        $data = FotoKegiatan::where('id',$id)->first(['gambar']);
        \File::delete('public/images/'.$data->gambar);
        $fotokegiatan = FotoKegiatan::where('id',$id)->delete();
    
        return Response::json($fotokegiatan);
    }
}
