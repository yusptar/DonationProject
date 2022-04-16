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
        
            $users   =   User::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'name' => $request->name, 
                            'email' => $request->email,
                            'password' => $request->password,
                            'roles' => $request->roles,

                        ]);
    
                        return response()->json(['success' => true]);
      
    }
    
    public function edit(Request $request)
    {
       
        $where = array('id' => $request->id);
        $users  = User::where($where)->first();

        return response()->json([$users]);
    }
 
   
    public function destroy(Request $request)
    {
        $users = User::where('id',$request->id)->delete();
        return response()->json(['success' => true]);
    }
}
