<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home1');
    }

    public function dashboard_view()
    {
        return view('manage_admin.dashboard');
    }

    public function user_view()
    {
        $users = DB::table('users')
                    ->get();
        return view('manage_admin.user_management',['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);
    
        $users = User::updateOrCreate(['id' => $request->id], [
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);
    
          return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);
      
    }
    
    public function edit(Request $request)
    {
       
        $where = array('id' => $request->id);
        $users  = User::where($where)->first();

        return response()->json([$users]);
    }
    public function edit_user($id)
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

    }
 
   
    public function destroy(Request $request)
    {
        $users = User::where('id',$request->id)->delete();
        return response()->json(['success' => true]);
    }
}
