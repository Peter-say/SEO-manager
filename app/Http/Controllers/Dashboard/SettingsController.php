<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Website_meta_description;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function settings()
    {

        $website_meta_description = Website_meta_description::first();
        // dd($website_meta_description->id);
        return  view('dashboard.settings', compact('website_meta_description'));
    }
}
