@extends('backend.cordinator.index')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mange Users</h4>
                            <p class="card-description">

                            </p>
                            <form method="POST" class="forms-sample" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input value="{{ $user->name }}" type="text" name="name" class="form-control"
                                        placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="password">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
