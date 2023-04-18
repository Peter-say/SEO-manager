@extends('web.layouts.app')

@section('content')
    <div class="container mt-5">
        <div>
            <!-- Basic Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('web.blog.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">{{$single_category->label}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $blog->blog_title }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            @include('notifications.flash_messages')
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 ">
                <div class="reading-list">{{ $blog->blog_title }}</div>
                <div>
                    <div class="d-flex justify-content-between">
                        <span><b>Written by</b>: {{ $blog->user->name }}</span>
                    </div>
                    <div class="blog-timestamp">
                        <span class="mr-5"><strong>Written On:</strong>{{ $blog->created_at->diffForHumans() }}</span>
                        <span><strong>Last Updated:</strong>{{ $blog->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
                <img class=" blog-detail-image" src="{{ asset($blog->cover_image ?? 'assets/img/elements/5.jpg') }}"
                    alt="{{ $blog->image_tag }}">
                <p id="article-text">{{ $blog->blog_description }}</p>
            </div>

            <div class="card col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <div class="card-hearder"><h3>Related Articles</h3></div>
                @foreach ($relatedPosts as $related)
                    <div class="">
                        <h5>{{ $related->blog_title }}</h5>
                        <p></p>
                    </div>
                @endforeach
            </div>

            @if ($comments->count())
                <div class="card col-xl-6 col-lg-6 col-md-8 col-sm-8 d-flex justify-content-center">

                    <div class="card-header">
                        <h5>Comments</h5>
                    </div>

                    @foreach ($comments as $comment)
                        <div class="card-body">
                            <label class="form-group" for=""><b>{{ $comment->username }} </b> says >>></label>
                            <p id="comment-text-area">{{ $comment->body }}</p>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="mt-5">
                    <h6>Be the first to comment</h6>
                </div>
            @endif
            <form enctype="multipart/form-data" action="{{ route('comments.store') }}" method="post">
                @csrf
                <div class="justify-content-center comment col-xl-6 col-lg-6 col-md-8 col-sm-8 mb-5">
                    <h4>Summit A comment</h4>
                    @if (Auth::user())
                        <div>
                            <label for="website">Website</label>
                            <input type="website" class="form-control" name="website" placeholder="Enter Website">
                        </div>
                        <div>
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="body" placeholder="Enter Comment" cols="2" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <div class="mt-2">
                            <button type="submit" class="form-control btn btn-primary">Submit</button>
                        </div>
                    @else
                    <div>
                        <label for="email">Name *</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            placeholder="Enter your Name">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div>
                            <label for="email">Email Adresss *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="website">Website</label>
                            <input type="website" class="form-control" name="website" placeholder="Enter Website">
                        </div>
                        <div>
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="body" placeholder="Enter Comment" cols="2" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <div class="mt-2">
                            <button type="submit" class="form-control btn btn-primary">Submit</button>
                        </div>
                    @endif
                </div>
            </form>

        </div>
    @endsection
