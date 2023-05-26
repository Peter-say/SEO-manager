<?php

namespace App\Http\Controllers\Dashboard\User\Applications;

use App\Http\Controllers\Controller;
use App\ImageFile;
use App\Models\Application\BlogNiche;
use App\Models\Application\Writer;
use App\Models\User;
use App\Notifications\NewWriterApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;

class WritersController extends Controller
{
    public function create(Writer $writer)
    {
        $user = Auth::user();
        $niches = BlogNiche::all();
        $writer = Writer::where('user_id', Auth::user()->id)->first();
        return view('dashboard.user.application.writer.create-application', compact('niches', 'writer'));
    }

    public function sendRequest(Request $request, User $user)
    {

        $data = $request->validate([
            'niche_id' => 'required|exists:blog_niches,id',
            'yrs_of_expirience' => 'required',
            'salary' => 'required',
            'resume' => 'required|mimes:pdf, doc, docx',

        ]);

        if ($request->hasFile('resume')) {
            $path = ImageFile::saveImageRequest($request->resume, 'ResumeFolder', $request);
            $data['resume'] = $path;
        }

        $data['user_id'] = Auth::user()->id;
        Writer::create($data);

        $admins = User::where(Auth::user()->role, 'is_admin');
        // Notification::send($admins, new NewWriterApplication($user));  

        return back()->with('success_message', 'We appreciate you for applying to write for us.
        We will as soon as possible check your application when we receive it');
    }

    public function track(BlogNiche $niche)
    {
        $application = Writer::with('niche')->where('user_id', Auth::user()->id)->first();
        // dd($application);
        return view('dashboard.user.application.writer.track-application', compact('application'));
    }

    public function delete($id)
    {
        Writer::where('id', $id)->first()->delete();
    }
}
