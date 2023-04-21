@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid mb-5">
        <h4 class="fw-bold py-3 mb-1">Settings</h4>
        <div class="card mt-2">
            <div> @include('notifications.flash_messages')</div>
            <div class="card-header">
                <h5>Permissions/Roles</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span> View, Add or remove role from users</span>
                    <span><a href="{{ route('dashboard.role') }}" class="btn btn-primary">Proceed</a></span>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h5>Website Meta Description</h5>
            </div>
            <div class="card-body">
                @if (empty($website_meta_description->description))
                    <div class="d-flex justify-content-between">
                        Add or update website description
                        <span><a href="{{ route('dashboard.website-meta-description.create') }}"
                                class="btn btn-primary">Proceed</a></span>
                    @else
                        <div class="row">
                            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
                                {{ $website_meta_description->description }}
                            </div>
                            <div class="d-flex justify-content-around col-lg-4 col-xl-4 col-md-12 col-sm-12 mt-2">
                                <span><a href="{{ route('dashboard.website-meta-description.edit', $website_meta_description->id) }}"
                                        class="btn btn-primary ">Edit</a></span>
                                <span>
                                    <form
                                        action="{{ route('dashboard.website-meta-description.destroy', $website_meta_description->id) }}"
                                        onsubmit="return confirm('This action can not be revoke. Are you sure you want to procees?')"
                                        method="post">
                                        @csrf @method('DELETE')
                                        <button onclick="$(this).parent().trigger('submit')"
                                            class="btn btn-danger">Remove</button>
                                    </form>
                                </span>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
