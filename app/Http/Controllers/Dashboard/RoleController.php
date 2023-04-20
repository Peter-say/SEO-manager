<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('dashboard.role.index', compact('user'));
    }

     // update user role

   public function role( Request $request , $id)
   {
      User::findOrFail($id)->update([
         'role' => $request->role,
      ]);
      return back()->with('sucess_message', 'Role updated successfully');
   }
}
