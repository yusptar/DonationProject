<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Santri;
use App\Models\Pengasuh;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_view()
    {
        return view('manage_admin.dashboard');
    }

    public function dashboard_view()
    {
        $jumlah_donatur = User::latest()->where('roles', 'Donatur')->count();
        $jumlah_santri = Santri::latest()->count();
        $jumlah_pengasuh = User::latest()->where('roles', 'Pengasuh')->count();
        return view('manage_admin.dashboard', compact('jumlah_donatur', 'jumlah_santri', 'jumlah_pengasuh'));
    }

    public function index(Request $request)
    {
        $users = User::latest()->get();
        
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('manage_admin.user_management',compact('users'));
    }

    public function store(Request $request)
    {
        User::updateOrCreate(['id' => $request->user_id],
                [
                    'name' => $request->name, 
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'roles' => $request->roles
                ]);        
   
        return response()->json(['success'=>'User saved successfully.']);
      
    }
    
    public function edit($id)
    {
        $users = User::find($id);
        return response()->json($users);
    }
    /*public function edit_user($id)
    {       
        $users = User::find($id);   
        return view('manage_admin.user_management_edit',['users'=>$users]);   
    }

    public function update_user($id, Request $request)
    {
        $users = User::find($id);
        
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->roles = $request->roles;

        $users->save();
        
        return redirect('manageuser');

    }*/
 
   
    public function destroy($id)
    {
        User::find($id)->delete();   
        return response()->json(['success'=>'User deleted successfully.']);
    }
}
