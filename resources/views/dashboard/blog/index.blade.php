@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">
        <div>
            <!-- Basic Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a style="font-size: 20px"; href="{{route('home')}}"><<<--- Go back to Dashboard</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">

            <div class="card-header d-flex justify-content-center">
                <h5>Reading Lists</h5>
            </div>

            <div class=" card-body">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class=" blog-index-content-area col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-5">
                            <h4><a href="{{ route('blog.show', $blog->id) }}" rel="noopener noreferrer">{{ $blog->blog_title }}</a>
                            </h4>
                            <div class="index-content-area">
                                <img class="img-fluid" src="{{asset($blog->cover_image ?? 'assets/img/elements/5.jpg')}}" alt="">
                                <p>{{ Str::of($blog->blog_description)->limit(200) }}</p>
                                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>

        </div>
    </div>
@endsection
