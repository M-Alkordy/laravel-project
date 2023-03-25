@extends('backend.cordinator.index')


@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <a href="{{ route('users.create') }}" class="btn btn-success m-3">Add User</a>
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
                        <th>Email</th>
                        <th>Status</th>
                        <th>Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->type ==true)
                                    <a href="" class="btn btn-outline-success btn-sm">Admin</a>
                                @else
                                    <a href="" class="btn btn-outline-danger btn-sm">Student</a>
                                @endif
                        </td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger" style="display: inline;">Delete</button>
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
