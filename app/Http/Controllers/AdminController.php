<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
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

    public function tambah(Request $request){
        try {
            DB::table('users')->insert([
                'name'                      => $request->name,
                'email'                     => $request->email,
                'password'                  => Hash::make($request->password),
                'created_at'                => Carbon::now(), 
                'roles'                     => $request->roles,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Tambah User Berhasil'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'errors', 'message' => $e->getMessage()], 406);
        }

    }

    public function hapus(Request $request){
        try {
            DB::table('users')
                    ->where('id', $request->id)
                    ->delete();
            return response()->json(['status' => 'success', 'result' => 'Hapus Data Berhasil'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'errors', 'message' => $e->getMessage()], 406);
        }
    }
}
