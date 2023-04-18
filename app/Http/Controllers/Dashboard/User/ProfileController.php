<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\ImageFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user =  Auth::user();
        $id = $user->id;
        return view('dashboard.user.profile', compact('user', 'id'));
    }
    public function update(Request $request, User $user)
    {
       
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'picture' => 'nullable|image',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'state' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'country' => 'nullable|string',
        ]);


       $user->where('id',$user)->update([
            $picture_path = ImageFile::saveImageRequest($request->picture, 'ProfilePictures', $request),
            'picture' => $picture_path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'state' => $request->input('state'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
        ]);
        dd($user);

        return back()->with('success_message', 'Profile Updated successfully');
    }
}
