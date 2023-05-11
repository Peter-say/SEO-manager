<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettings extends Controller
{
    public function view()
    {
        return view('dashboard.user.account-settings');
    }

    public function getAccount()
    {
        $user = Auth::user()->id;
        $id = $user;
        return view('dashboard.user.delete-account', compact('id'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('register')->with('success_message', 'You have successfully deleted your account.If you would change you mind to join again, please register new account. Thanks');
    }
}
