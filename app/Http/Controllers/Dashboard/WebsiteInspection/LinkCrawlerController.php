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

        // Return the response instead of printing it out

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Send the request and store the result in $response
        $response = curl_exec($ch);

        return $response;
        // Closing cURL
        curl_close($ch);
    }
}
