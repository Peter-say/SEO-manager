<?php

namespace App\Http\Controllers\Dashboard\WebsiteInspection;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class LinkCrawlerController extends Controller
{

    public function linkChecker()
    {
    
        return view('dashboard.links.index');
    }

    public function getUrl(Request $request, $url = null)
    {


        $data = shell_exec("Python" . app_path() . "C:\Web Development\Laravel\SEO\SEO\app\PythonScripts\PythonTest.py");

        // $process->run();
    
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        // $data = $process->getOutput();

        dd($data);

       
        // $output = WebCrawler::crawler($request);
        // $data = $request->validate(['web_url' => 'required|url']);
        // $url = $request->input('web_url');
        // // Initialize curl
        // $ch = curl_init();

        // // URL for Scraping
        // $web_url = curl_setopt($ch, CURLOPT_URL, $url);

        // // Set the HTTP method
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // // Return the response instead of printing it out

        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // // Send the request and store the result in $response
        // $response = curl_exec($ch);

        // return $response;
        // Closing cURL
        // curl_close($ch);
    }
}
