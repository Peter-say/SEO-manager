@extends('dashboard.layouts.app2')

@section('content')
    <div class="container mt-5">

        @include('notifications.flash_messages')

        <form enctype="multipart/form-data" action="{{ route('category.store') }}" method="post">
            @csrf

            <div class="row">
                <div class=" form-group col-lg-8 col-xl-8 col-md-12 col-sm-12 pb-2">
                    <label for="">Add New Lebel <span class="">*</span></label>
                    <input class="form-control @error('label') is @enderror" type="text" name="label" id="newLabelInput">
                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-lg-4 col-xl-4 col-md-12 col-sm-12 mt-4 pb-2">
                    <button id="save_new_lebel" class="btn btn-primary btn-sm w-50">Save</button>
                </div>
            </div>
        </form>

    </div>
@endsection
