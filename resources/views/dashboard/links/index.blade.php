@extends('dashboard.layouts.app2')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('notifications.flash_messages')
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">URL Inspection/</h4>
        <form action="{{route('dashboard.crawl-url')}}" method="get">
            <div class=" col-8 input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" name="web_url" class="form-control" placeholder="Enter a website URL..." aria-label="Search..."
                    aria-describedby="basic-addon-search31" />
            </div>
        </form>
    </div>
 
@endsection
