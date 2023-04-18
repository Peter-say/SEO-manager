@extends('dashboard.layouts.app2')

@section('content')
    <form enctype="multipart/form-data" action="{{ route('dashboard.file-upload.store') }}" method="post">
        @csrf
        <div class=" justify-content-center">
            @include('notifications.flash_messages')
        </div>

        <div class="container mt-5 form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2 justify-content-center">
            <div>
                <input class="form-control " type="file" name="file_info">
            </div>
            <div class="container mt-5 form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2 justify-content-center">
                <button class="form-control btn btn-primary btn-sm">Add</button>
            </div>
        </div>
    </form>

    <div class=" justify-content-center">
        @foreach ($images as $image)
        
                <img class="img-fluid col-xl-3 col-lg-3 col-md-4 col-sm-12" src="{{ asset($image->file_info) }}" alt="images">
           
        @endforeach
    </div>
@endsection
