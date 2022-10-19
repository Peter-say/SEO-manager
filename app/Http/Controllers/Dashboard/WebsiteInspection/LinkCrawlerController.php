<?php

namespace App\Http\Controllers\Dashboard\WebsiteInspection;

use App\Http\Controllers\Controller;
use App\WebsiteObservers\CustomObserver;
use Illuminate\Http\Request;
use Spatie\Crawler\Crawler;

class LinkCrawlerController extends Controller
{
    // public function __construct(CustomObserver  $observers)
    // {
    //     $this->observers = $observers;
    // }

    public static function handle($website_url = null)
    {
        
        $website_url = 'https://www.myschoolupdates.blog/';
        Crawler::create()
        ->setCrawlObserver(new CustomObserver)
        ->startCrawling($url);
        dd($website_url);
    } 
    
    public function linkChecker()
    {
      
        $items = $this->handle();
        // dd($items);
        return view('dashboard.links.index' , compact($items));
    }
}
