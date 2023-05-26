<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application\Writer;
use App\Models\User;
use Illuminate\Http\Request;

class WriterApplicationController extends Controller
{
    public function index()
    {
        $user = User::get();
        // $role = User::where('role' , 'is_author');
        $applications = Writer::with('user')->get();
        return view('dashboard.applications.writers.index', compact('applications', 'user'));
    }

    public function approve(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'role' => $request->role,
        ]);

        return back()->with('success_message', 'Application approved');

    }
}
