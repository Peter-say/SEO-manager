@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-between">
            <h4>Create A New Blog Post</h4>
            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Add a new category</a>
        </div>
        <hr>
        @include('notifications.flash_messages')
        <form action="{{ route('blog.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row ">
                <div class=" form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2">
                    <label for="">Title <span class="">*</span></label>
                    <input type="text" name="blog_title"
                        class="form-control @error('blog_title') is-invalid @enderror" value="{{old('blog_title')}}" placeholder="blog title">
                    @error('blog_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group col-lg-4 col-xl-4 col-md-12 col-sm-12 pb-2">
                    <label for="">Select Existing Category ID <span class="">*</span></label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror"
                        id="">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option id="" value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2">
                    <label for="">Cover Image<span class="">*</span></label>
                    <input type="file" class="form-control" name="cover_image" id=""/>
                    @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group col-lg-4 col-xl-4 col-md-12 col-sm-12 pb-2">
                    <label for="">Meta Title<span class="">*</span></label>
                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}" placeholder="meta title">
                </div>
                <div class=" form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2">
                    <label for="">Blog Description<span class="">*</span></label>
                    <textarea name="blog_description" class="form-control @error('blog_description') is-invalid @enderror" id=""
                        cols="30" rows="10" value="{{old('blog_description')}}" placeholder="type your blog"></textarea>
                    @error('blog_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group col-lg-4 col-xl-4 col-md-12 col-sm-12 pb-2">
                    <label for="">Meta Description<span class="">*</span></label>
                    <textarea type="text" name="meta_description" cols="10" rows="10"
                        class="form-control @error('meta_description') is-invalid @enderror" value="{{old('meta_description')}}" placeholder="meta_description"></textarea>
                    @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group col-lg-10 col-xl-10 col-md-12 col-sm-12 pb-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
