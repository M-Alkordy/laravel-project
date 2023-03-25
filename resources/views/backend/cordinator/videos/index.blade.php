@extends('backend.cordinator.index')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <a href="{{ route('videos.create') }}" class="btn btn-success m-3">Add Video</a>
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Videos</p>
                            <div class="table-responsive">
                                <table id="recent-purchases-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Number</th>
                                            <th>Category</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $video->name }}</td>
                                                <td>{{ $video->description }}</td>
                                                <td>{{ $video->number }}</td>
                                                <td>{{ $video->category->name }}</td>
                                                <td>
                                                    <a href="{{ route('videos.edit', $video->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger"
                                                        onclick="event.preventDefault();
                                document.getElementById('delete-data').submit();">Delete</a>
                                                    <form id="delete-data"
                                                        action="{{ route('videos.destroy', $video->id) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    @endsection
