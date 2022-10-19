@extends('dashboard.layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">URL Inspection/</h4>
        <div class=" col-8 input-group input-group-merge">
            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                aria-describedby="basic-addon-search31" />
        </div>
    </div>

    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">URL</th>
                    <th scope="col">Status</th>
                    <th scope="col">Path</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $idx => $item)
                    <tr>
                        <th scope="row">{{ $idx + 1 }}</th>
                        <td>{{ $item->url }}</td>
                        <td>{{ $item->status }}</td>
                        <td><a href="{{ url($item->path ? $item->path : '') }}">{{ $item->path ? $item->path : '' }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
