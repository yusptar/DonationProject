<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Redirect,Response,DB;
use File;
use PDF;

class KegiatanController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Kegiatan::select('*'))
            ->addColumn('action', 'product-button')
            ->addColumn('image', 'image')
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }

    return view('manage_admin.kegiatan_manage');
    }
    
    public function store(Request $request)
    {  
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $kegiatanId = $request->kegiatan_id;
    
        $details = ['title' => $request->title, 'description' => $request->description];
    
        if ($files = $request->file('image')) {
            
        //delete old file
        \File::delete('public/kegiatan/'.$request->hidden_image);
        
        //insert new file
        $destinationPath = 'public/kegiatan/'; // upload path
        $kegiatanImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $kegiatanImage);
        $details['image'] = "$kegiatanImage";
        }
        
        $kegiatan   =   Kegiatan::updateOrCreate(['id' => $kegiatanId], $details);  
            
        return Response::json($kegiatan);
    }

    public function edit($id)
    {   
    $where = array('id' => $id);
    $kegiatan  = Kegiatan::where($where)->first();
  
    return Response::json($kegiatan);
    }

    public function destroy($id) 
    {
    $data = Kegiatan::where('id',$id)->first(['image']);
    \File::delete('public/kegiatan/'.$data->image);
    $kegiatan = Kegiatan::where('id',$id)->delete();
  
    return Response::json($kegiatan);
    }
}
