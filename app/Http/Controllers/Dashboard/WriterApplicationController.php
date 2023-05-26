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
        $applications = Writer::with('user')->get();
        return view('dashboard.applications.writers.index', compact('applications', 'user'));
    }

    public function approve(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'role' => $request->role,
        ]);
        return back()->with('success_message', 'Please, click the Mark As Aprove button to compleate this application');
    }

    public function markStatusAsApprove(Request $request, $id)
    {
        Writer::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        return back()->with('success_message', 'Application approved.');
    }

    public function removeAuthorPreviledge(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'role' => $request->role,
        ]);
        return back()->with('success_message', 'User witdrew as an Author.');
    }

    public function markStatusAsPending(Request $request, $id)
    {
        Writer::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        return back()->with('success_message', 'Application has been set as pending.');
    }
}
