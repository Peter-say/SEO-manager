<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\ImageFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.user.profile', compact('user'));
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function update(Request $request, $id)
    {

        $user = Auth()->user();
        $existing_picture_path = $user->picture;
        if (!empty('picture')) {
            $picture_path = $existing_picture_path;
        }
        if ($request->hasFile('picture')) {
            $picture_path = ImageFile::saveImageRequest($request->picture, 'ProfilePictures', $request);
        }

        $data =  User::findOrFail($id);
        $data['picture'] = $picture_path;
        $user = [
            'picture' => $picture_path,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            // dd($request->all()),
        ];
        $data->update($user);
        return back()->with('success_message', 'Profile Updated successfully');
    }
}
