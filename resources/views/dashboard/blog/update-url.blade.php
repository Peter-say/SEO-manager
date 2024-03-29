@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-between">
            <h4>Update Blog URL</h4>
            <a href="{route('home')}" class="btn btn-primary btn-sm">Return back to blog</a>
        </div>
        <i>The link below was generated by default from your blog title. To enhance a better SEO-friendly link,
            you can use the form below to adjust it to your taste or save it</i>
        <hr>
        @include('notifications.flash_messages')
        <form action="{{ route('update-blog_url', ['id' => $blog->id]) }}" class="form-group"
            enctype="multipart/form-data" method="post">
            @csrf @method('PUT')
            <div class="form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2 ">
                <input type="text" class="form-control" value="{{ $default_blog_URL }}" name="blog_url" id="">
            </div>
            <div class="form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 ">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
