<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Blog $post)
    {
        $blogs = Blog::orderby('updated_at', 'desc')->paginate(6);
        // $metaData = Metadata::onPageMetadata($post);
        return view('web.blogs.index', [
            'blogs' => $blogs,
            // "metaData" => $metaData ,
        ]);
    }

    public function search()
    {
        $search = $_GET['query'];
        $blogs = Blog::where('blog_title' ,'like', '%' . $search . '%')
        ->where('blog_description' ,'like', '%' . $search . '%')
        ->get();
        return view('web.blogs.index' , compact('blogs'));
    }

/**
 * 
 * @param int $id
 * @return \Illuminate\Http\Response
 */

    public function details($blog, Category $category)
    {
        $blog = Blog::where('id', $blog)->first();
        $comments = $blog->comments;
        $single_category = $blog->category;
        $relatedPosts = Blog::whereHas('category')->get();
        // dd($relatedPosts);
        // $metaData = Metadata::onPageMetadata($post);

        // dd($relatedPosts);
        return view('web.blogs.detail-page', [
            'blog' => $blog,
            'single_category' => $single_category,
            'comments' => $comments,
            "relatedPosts" =>  $relatedPosts,
        ]);
    }

    public function categoryIndex()
    {
        $categories = Category::all();
        return view('web.layouts.include.sidebar', compact('categories'));
    }
}
