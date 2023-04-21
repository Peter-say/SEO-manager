<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Website_meta_description;
use Illuminate\Http\Request;

class WebsiteDescription extends Controller
{
    public function create()
    {
        return view('dashboard.meta-description.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['description' => 'required|string|max:150']);
        Website_meta_description::create($data);
        return redirect()->route('dashboard.settings')->with('sucess_message', 'Website meta description added');
    }

    public function edit($id)
    {
        $website_meta_description = Website_meta_description::findOrfail($id);
        return view('dashboard.meta-description.edit', compact('website_meta_description'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['description' => 'required|string|max:150']);
        $website_meta_description = Website_meta_description::findOrFail($id);
        $website_meta_description->update($data);
        return redirect()->route('dashboard.settings')->with('sucess_message', 'Website meta description updated successfully');
    }

    public function destroy($id)
    {
      Website_meta_description::findOrFail($id)->delete();
        return redirect()->route('dashboard.settings')->with('sucess_message', 'Website meta description Removed successfully');
    }
}
