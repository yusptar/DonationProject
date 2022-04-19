<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoKegiatan;
use DataTables;

class FotoKegiatanController extends Controller
{

    public function index(Request $request)
    {
   
        $fotokegiatans = FotoKegiatan::latest()->get();
        
        if ($request->ajax()) {
            $data = FotoKegiatan::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('manage_admin.fotokegiatan_management',compact('fotokegiatans'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::updateOrCreate(['id' => $request->fotokegiatans_id],
                ['title' => $request->title, 'author' => $request->author]);        
   
        return response()->json(['success'=>'Book saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotokegiatans = FotoKegiatan::find($id);
        return response()->json($fotokegiatans);
    }
  
    public function destroy($id)
    {
        FotoKegiatan::find($id)->delete();
     
        return response()->json(['success'=>'FotoKegiatan deleted successfully.']);
    }
}
