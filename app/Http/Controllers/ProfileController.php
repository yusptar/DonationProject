<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile', [
            'user' => $request->user()
        ]);

    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );
        return redirect()->route('edit');
    }
}
