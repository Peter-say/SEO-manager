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

      $users = User::all();
      return view('dashboard.users.index', compact('users'));
   }

}
