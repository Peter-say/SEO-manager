@extends('web.layouts.app')

@section('content')
    <div class="container mt-5">
        <div>
            @include('notifications.flash_messages')
            <!-- Basic Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('web.blog.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">{{  $categoryLabel }}</li>
                </ol>
            </nav>
        </div>
       
        <div class="card">
            
            <div class="card-header d-flex justify-content-center">
                <h5>{{ $categoryLabel}}</h5>
            </div>

            <div class=" card-body">
                <div class="row">
                    @foreach ( $categoryBlogs as $blog)
                        <div class=" blog-index-content-area col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-5">
                            <h4><a href="{{ route('web.blog', $blog->id) }}" rel="noopener noreferrer">{{ $blog->blog_title }}</a>
                            </h4>
                            <div class="index-content-area">
                                <img class="img-fluid" src="{{asset($blog->cover_image ?? 'assets/img/elements/5.jpg')}}" alt="">
                                <p>{{ Str::of($blog->blog_description)->limit(200) }}</p>
                                <a href="{{ route('web.blog', $blog->id) }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>

        </div>
    </div>
@endsection