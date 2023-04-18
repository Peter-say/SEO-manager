<?php

namespace App\Website;

use Illuminate\Http\Request;

class WebCrawler
{
    public static function crawler(Request $request)
    {
        return [

            $data = $request->validate(['web_url' => 'required|url']),
            $url = $request->input('web_url'),
            // Initialize curl
            $ch = curl_init(),
            // URL for Scraping
            $web_url = curl_setopt($ch, CURLOPT_URL, $url),
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true),

        ];
    }
}
