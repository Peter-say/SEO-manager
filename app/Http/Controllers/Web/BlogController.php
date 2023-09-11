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
        $categories = Category::all();
        $blogs = Blog::orderby('updated_at', 'desc')->paginate(6);
        // $metaData = Metadata::onPageMetadata($post);
        return view('web.blogs.index', [
            'blogs' => $blogs,
            'categories' => $categories,
            // "metaData" => $metaData ,
        ]);
    }

    public function search()
    {
        $search = $_GET['query'];
        $blogs = Blog::where('blog_title', 'like', '%' . $search . '%')
            ->where('blog_description', 'like', '%' . $search . '%')
            ->get();
        return view('web.blogs.index', compact('blogs'));
    }

    /**
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function details($blogId, Category $category)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($blogId);
        $comments = $blog->comments;
        $singleCategory = $blog->category;

        $relatedPosts = Blog::where('category_id', $singleCategory->id)
            ->where('id', '!=', $blogId) // Exclude the current blog post
            ->limit(5)
            ->get();

        return view('web.blogs.detail-page', [
            'blog' => $blog,
            'single_category' => $singleCategory,
            'comments' => $comments,
            'relatedPosts' => $relatedPosts,
            'categories' => $categories,
        ]);
    }


    public function categoryIndex()
    {
        $categories = Category::all();
        return view('web.layouts.include.sidebar', compact('categories'));
    }

    public function categoryBlogs(Category $category, $id)
    {
        $category = $category->findOrFail($id);
        $categoryLabel = $category->label;
        $categoryBlogs = $category->blogs()->get();
    
        return view('web.blogs.category-blogs', [
            'categoryBlogs' => $categoryBlogs,
            'categoryLabel' => $categoryLabel,
        ]);
    }
}
