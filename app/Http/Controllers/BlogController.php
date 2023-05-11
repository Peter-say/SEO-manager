<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ImageFile;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Policies\BlogPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $post, User $user)
    {
        $blogs = Blog::orderby('updated_at', 'desc')->paginate(6);
        // $metaData = Metadata::onPageMetadata($post);
        return view('dashboard.blog.index', [
            'blogs' => $blogs,
            // "metaData" => $metaData ,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        $this->authorize(ability: 'create' , arguments:User::class);
        $categories = Category::all();
        return view('dashboard.blog.create-blog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('blog_url', $blog->id)->with("success_message", "Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $blog = Blog::find($id);
        $comments = $blog->comments;
        $single_category = $blog->category;
        $relatedPosts =  Blog::where($id)->has('category');
        // $metaData = Metadata::onPageMetadata($post);

        return view('dashboard.blog.blog-details', [
            'blog' => $blog,
            'single_category' => $single_category,
            'comments' => $comments,
            "relatedPosts" =>  $relatedPosts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $blog = Blog::where('id', $id)->first();
        return view('dashboard.blog.update-blog', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize(ability: 'update' , arguments:User::class);

        $data = $request->validate([
            "category_id" => "required|exists:categories,id",
            "cover_image" => "nullable|image",
            "blog_description" => "required",
            "blog_title" => "required|max:100",
            "meta_title" => "nullable",
            "meta_description" => "nullable|max:150",

        ]);
        $blog = Blog::where('id', $id)->first();
        $existing_path = $blog->cover_image;

        if (!empty('cover_image')) {
            $image_path = $existing_path;
        }
        if ($request->hasFile('cover_image')) {
            $image_path = ImageFile::saveImageRequest($request->cover_image, 'ImageFolder', $request);
        }
        $data['cover_image'] = $image_path;
        $data['user_id'] = auth()->user()->id;
        $blog->update($data);
        return redirect()->route('blog_url', $blog->id)->with("success_message", "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id', $id)->first()->delete();
        return back()->with('sucess_message', 'Blog removed successfully');
    }

    public function search()
    {
        $search = $_GET['query'];
        $blogs = Blog::where('blog_title', 'like', '%' . $search . '%')
            ->where('blog_description', 'like', '%' . $search . '%')
            ->get();
        return view('dashboard.blog.index', compact('blogs'));
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function reviewBlogURL($id)
    {
        $blog = Blog::where('id', $id)->first();
        $default_blog_URL = Str::slug($blog->blog_title);
        return view('dashboard.blog.update-url', compact('default_blog_URL', 'blog'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function updateBlogURL(Request $request, $id)
    {
        Blog::findOrFail($id)->update([
            'blog_url' => $request->blog_url,
        ]);
        return redirect()->route('blog.show', $id)->with('sucess_message', 'URL updated');
    }
}
