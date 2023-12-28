<?php

namespace App\Http\Controllers\Dashboard\WebsiteInspection;

use Symfony\Component\DomCrawler\Crawler;
use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LinkCrawlerController extends Controller
{

    public function linkChecker()
    {
        return view('dashboard.links.index');
    }

    public function getUrl(Request $request)
    {
        $request->validate(['web_url' => 'required|url']);
        $url = $request->input('web_url');

        // Initialize Guzzle client
        $client = new Client();

        try {
            // Send a GET request to the specified URL
            $response = $client->get($url);

            // Get the HTML content from the response
            $htmlContent = $response->getBody()->getContents();

            // Create a Crawler instance from the HTML content
            $crawler = new Crawler($htmlContent);

            // Extract the title tag content
            $title = $crawler->filter('title')->text();

            // Extract the meta description tag content
            $metaDescription = $crawler->filter('meta[name="description"]')->attr('content');

            // Extract other meta tags
            $metaTags = [];
            $crawler->filter('meta')->each(function (Crawler $node) use (&$metaTags) {
                $name = $node->attr('name');
                $content = $node->attr('content');
                if ($name && $content) {
                    $metaTags[$name] = $content;
                }
            });

            $imageUrls = $crawler->filter('img')->each(function (Crawler $node) {
                return $node->attr('src');
            });

            // Store the scraped data in the session
            session(['scraped_content' => [
                'title' => $title,
                'description' => $metaDescription,
                'metaTags' => $metaTags,
                'imageUrls' => $imageUrls,
            ]]);

            // Redirect back to the same page with the form
            return redirect()->route('dashboard.page-information')->with('success_message', 'Content scraped successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function scrapedContent()
    {    
        $request = request();
        $url = $request->input('web_url');
        return view('dashboard.links.page-information', ['url' => $url]);
    }
}
