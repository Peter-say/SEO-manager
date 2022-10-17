<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // public function check_url($url)
    // {
    //     $headers = @get_headers($url);
    //     $headers = is_array($headers) ? implode("\n", $headers) : $headers;
    //     return (bool) preg_match('#HTTP/.*\s+[(200|301|302)] + \s#i', $headers); 
    // }

    public function index()
    {
             return view('dashboard.home', [
            
        ]);
    }

   
   
}
