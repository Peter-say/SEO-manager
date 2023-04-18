@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">
        @include('notifications.flash_messages')

        <form enctype="multipart/form-data" action="{{ route('comments.update', $comment->id) }}" method="post">
            @csrf @method('PUT')
            <div class="justify-content-center comment col-xl-6 col-lg-6 col-md-8 col-sm-8 mb-5">
                <h4>Update your comment</h4>
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$comment->username}}"
                        placeholder="Enter your name">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="email">Email Adresss *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$comment->email}}" placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="website">Website</label>
                    <input type="website" class="form-control" name="website" value="{{$comment->website}}" placeholder="Enter Website">
                </div>
                <div>
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="body" placeholder="Enter Comment" cols="2" rows="5">{{$comment->body}}</textarea>
                </div>
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="mt-2">
                    <button type="submit" class="form-control btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection
