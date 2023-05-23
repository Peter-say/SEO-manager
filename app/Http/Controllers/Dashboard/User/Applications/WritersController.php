<?php

namespace App\Http\Controllers\Dashboard\User\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application\BlogNiche;
use App\Models\Application\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WritersController extends Controller
{
    public function create()
    {
        $niches = BlogNiche::all();
        return view('dashboard.user.application.writer.create-application', compact('niches'));
    }

    public function sendRequest(Request $request)
    {

        $data = $request->validate([
            'niche_id' => 'required|exists:blog_niches,id',
            'yrs_of_expirience' => 'required',
            'salary' => 'required',
            'resume' => 'required|mimes:pdf, doc, docx',

        ]);

        $data['user_id'] = Auth::user()->id;
        Writer::create($data);

        return back()->with('success_message', 'We appreciate you for applying to write for us.
        We will as soon as possible check your application when we receive it');
    }
}
