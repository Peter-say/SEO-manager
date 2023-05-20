@extends('dashboard.layouts.app2')

@section('content')
<div class="container-fluid mt-3">
    @foreach ($blogs as $blog)
        <div>
            @include('notifications.flash_messages')
        </div>
        <div class=" card mb-3  ">
            <div class="card-body  row">
                <div class="col-xl-8 col-lg-8 col-md-4 col-sm-4">
                    <h3>{{ Str::of($blog->blog_title)->limit(350) }}</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <img class="img-fluid dashboard-blog-list"
                        src="{{ asset($blog->cover_image ?? 'assets/img/elements/5.jpg') }}" alt="">
                </div>
                <div class="col-12 d-flex justify-content-right ">
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-secondary btn-sm text-sm m-2">View</a>
                        @if (Auth::user()->id == $blog->user->id || Auth::user()->role == 'is_admin' || Auth::user()->role == 'is_moderator')
                            <a href="{{ route('blog.edit', $blog->id) }}"
                                class="btn btn-primary btn-sm text-sm m-2">Edit</a>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="post"
                                onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="$(this).parent().trigger('submit')"
                                    class="btn btn-danger btn-sm text-sm m-2">Remove</button>
                            </form>
                        @endif
                    <a href="" class="fas fas-share m-2">Share</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
