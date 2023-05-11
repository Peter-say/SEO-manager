<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\SEO\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
       
        $metaData = Metadata::DEFALT_META_DESCRIPTION;
        $blogs = Blog::get();
        return view('dashboard.home', compact('metaData' , 'blogs'));
    }

    public function generalView($meta_description)
    {
        $blog = Blog::first();
        $meta_description = Metadata::onPageMetadata($meta_description);
        return view('dashboard.layouts.app2', compact('meta_description'));
    }
}
