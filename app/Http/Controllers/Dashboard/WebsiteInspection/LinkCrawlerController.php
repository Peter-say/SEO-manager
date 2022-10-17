<?php

namespace App\Http\Controllers\Dashboard\WebsiteInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinkCrawlerController extends Controller
{
    public function linkChecker()
    {
        return view('dashboard.links.index');
    }
}
