<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Alert;
use App\Models\User;

class ProfileController extends Controller
{

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();
    	return view('donatur.profile', compact('user'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            'password'  => 'confirmed',
        ]);

		$fileName = '';
    	$user = User::where('id', Auth::user()->id)->first();	
    	$user->name = $request->name;
    	$user->email = $request->email;
		$user->alamat = $request->alamat;

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($user->image) {
				Storage::delete('public/images/' . $user->image);
			}
		} else {
			$fileName = $request->image;
		}
		$user->image = $fileName;
		$user->nohp = $request->nohp;
		$user->instansi = $request->instansi;

		if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
		}
    	

    	$user->update();

    	Alert::success('Sukses Update Profile');
		return redirect()->back();
    }
}
