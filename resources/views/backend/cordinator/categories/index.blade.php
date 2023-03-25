@extends('backend.cordinator.index')


@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <a href="{{ route('categories.create') }}" class="btn btn-success m-3">Add Category</a>
      <div class="row">
        <div class="col-md-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Categories</p>
              <div class="table-responsive">
                <table id="recent-purchases-listing" class="table">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Notes</th>
                        <th>Handle</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($categories as $category)

                    <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->image }}</td>
                            <td>{{ $category->notes }}</td>
                            <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a></td>
                            {{-- <td><a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger">Delete</a></td> --}}
                            <td>
                                <a href="" class="btn btn-danger" onclick="event.preventDefault();
                                document.getElementById('delete-data').submit();">Delete</a>
                                <form id="delete-data" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
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
@endsection
