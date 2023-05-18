<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
   public function index()
   {
      $this->authorize(ability: 'view' , arguments:User::class);

      $users = User::paginate(10);
      return view('dashboard.users.index', compact('users'));
   }

   public function delete($id)
   {
      User::findOrFail($id)->delete();
      return back()->with('success_message', 'User has been removed successfully');
   }

}
