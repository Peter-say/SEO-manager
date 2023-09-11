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
    $output = [];
    $returnCode = 0;
    
    // Adjust the command based on the Python executable name and script path
    $command = 'python3 ' . base_path('app/PythonScripts/PythonTest.py');
    
    exec($command . ' 2>&1', $output, $returnCode);

    error_log(print_r($output, true));

    if ($returnCode === 0) {
        // Python script executed successfully
        return response()->json([
            'output' => $output,
        ]);
    } else {
        // Error occurred while executing Python script
        return response()->json([
            'error' => 'An error occurred while executing the Python script.',
        ], 500);
    }



       
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
    public function runPythonScript()
    {
        $process = new Process(['python', 'PythonScripts\PythonTest.py']);
        
        try {
            $process->mustRun();
            
            $output = $process->getOutput();
            
            return response()->json([
                'output' => $output,
            ]);
        } catch (ProcessFailedException $exception) {
            return response()->json([
                'error' => 'An error occurred while executing the Python script.',
            ], 500);
        }
    }

}
