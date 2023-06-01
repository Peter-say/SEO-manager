@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        @include('notifications.flash_messages')
        @if ($writer)
            <div class="d-flex justify-content-around bg-primary text-white">
                <p class="p-5">You have Already Applied For This. Wait for your application to be review</p> 
                <span><a href="{{route('dashboard.user.application.writer.track-application')}}" class="btn btn-warning mt-5">Track application</a></span>
            </div>
        @else
            <form action="{{ route('dashboard.user.application.writer.send-request') }}" enctype="multipart/form-data"
                method="post">
                @csrf @method('POST')
                <div class="row">
                    <div class=" form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="" class="">Choose Blog Niche</label>
                        <select class=" form-control  @error('niche_id') is-invalid @enderror" name="niche_id" id="">
                            <option value="Select">Select</option>
                            @foreach ($niches as $niche)
                                <option value="{{ $niche->id }}">{{ $niche->name }}</option>
                            @endforeach
                        </select>
                        @error('niche_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="" class="">Years Of Writing Expirience</label>
                        <input type="number" class=" form-control  @error('yrs_of_expirience') is-invalid @enderror"
                            name="yrs_of_expirience">

                        @error('yrs_of_expirience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="" class="">Salary Expectection</label>
                        <input type="number" class=" form-control  @error('salary') is-invalid @enderror" name="salary">
                        <small>Amount should be in Dollars($). Please don't include the sign</small>

                        @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-2">
                        <label for="" class="">Add your resume</label>
                        <input type="file" class=" form-control  @error('resume') is-invalid @enderror" name="resume">

                        @error('resume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class=" form-group col-xl-3 col-lg-3 col-md-12 col-sm-12 mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
