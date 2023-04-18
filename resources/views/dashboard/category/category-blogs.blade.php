@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class=" blog-index-content-area col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-5">
                            <h4><a href="{{ route('blog.show', $blog->id) }}"
                                    rel="noopener noreferrer">{{ $blog->blog_title }}</a>
                            </h4>
                            <div class="index-content-area">
                                <img class="img-fluid" src="{{ asset($blog->cover_image ?? 'assets/img/elements/5.jpg') }}"
                                    alt="">
                                <p>{{ Str::of($blog->blog_description)->limit(200) }}</p>
                                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
