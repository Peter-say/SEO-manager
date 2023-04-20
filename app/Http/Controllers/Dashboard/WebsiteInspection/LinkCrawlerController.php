<?php

namespace App\Http\Controllers\Dashboard\WebsiteInspection;

use App\crawler;
use App\Http\Controllers\Controller;
use App\Website\WebCrawler;
use DOMDocument;
use Illuminate\Http\Request;



class LinkCrawlerController extends Controller
{

    public function linkChecker()
    {
        //  $fetch_link = Crawler::crawl_page($depth = 5);
        //  dd($fetch_link);
        return view('dashboard.links.index');
    }

    public function getUrl(Request $request, $url = null)
    {

        // $output = WebCrawler::crawler($request);
        $data = $request->validate(['web_url' => 'required|url']);
        $url = $request->input('web_url');
        // Initialize curl
        $ch = curl_init();

        // URL for Scraping
        $web_url = curl_setopt($ch, CURLOPT_URL, $url);

        // Set the HTTP method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $web_url);


        if (self::getUrl($request, $url))
            echo "Link Works";
        else
            echo "Broken Link";

        $response = curl_exec($ch);

        // Closing cURL
        curl_close($ch);

        return back()->with('success_message', 'Crawled Successfully');
    }
}
