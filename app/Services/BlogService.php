<?php

namespace App\Services;

use App\ImageFile;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BlogService
{

    public static function validate(array $data)
    {
        $validator = Validator::make($data, [
            "category_id" => "required|exists:categories,id",
            "cover_image" => "nullable|image",
            "blog_description" => "required",
            "blog_url" => "nullable|max:100",
            "blog_title" => "required|max:100",
            "meta_title" => "nullable",
            "meta_description" => "nullable|max:150",

        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }

    public static function save(Request $request)
    {
        if ($request->hasFile('cover_image')) {
            $path = ImageFile::saveImageRequest($request->cover_image, 'ImageFolder', $request);
            $data['cover_image'] = $path;
        }
        $data['category_id'] = $request->input('category_id');
        $data['blog_description'] = $request->input('blog_description');
        $data['blog_title'] = $request->input('blog_title');
        $data['user_id'] = auth()->user()->id;
        $blog = Blog::create($data);

        return $blog;
    }


    public static function updateBlog(array $data)
    {
        $validator = Validator::make($data, [
            "category_id" => "required|exists:categories,id",
            "cover_image" => "nullable|image",
            "blog_description" => "required",
            "blog_url" => "nullable|max:100",
            "blog_title" => "required|max:100",
            "meta_title" => "nullable",
            "meta_description" => "nullable|max:150",

        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }

    public static function saveUpdate(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        $existing_path = $blog->cover_image;

        if (!empty('cover_image')) {
            $image_path = $existing_path;
        }
        if ($request->hasFile('cover_image')) {
            $image_path = ImageFile::saveImageRequest($request->cover_image, 'ImageFolder', $request);
        }
        $data['category_id'] = $request->input('category_id');
        $data['blog_description'] = $request->input('blog_description');
        $data['blog_title'] = $request->input('blog_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['meta_title'] = $request->input('meta_title');
        $data['cover_image'] = $image_path;
        $data['user_id'] = auth()->user()->id;
        $blog->update($data);
        return $blog;
    }
}
