<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ImageFile;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        if ($blogs->count() > 0) {
            return response()->json([
                'status' => 200,
                'blogs' => $blogs,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'blogs' => 'No record found',
            ], 404);
        }
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "category_id" => "required|exists:categories,id",
            "cover_image" => "nullable|image",
            "blog_description" => "required",
            "blog_url" => "nullable|max:100",
            "blog_title" => "required|max:100",
            "meta_title" => "nullable",
            "meta_description" => "nullable|max:150",

        ]);
        if ($request->hasFile('cover_image')) {
            $path = ImageFile::saveImageRequest($request->cover_image, 'ImageFolder', $request);
            $data['cover_image'] = $path;
        }
        $data['user_id'] = auth()->user()->id;
        $blog = Blog::create($data);

        if ($request->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $request->messages(),
            ], 422);
        } else {
            $blog = Blog::create($data);

            if ($blog) {
                return response()->json([
                    'status' => 200,
                    'message' => 'blog added successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'blog' => 'something went wrong',
                ], 404);
            }
        }
    }
}
