@extends('backend.cordinator.index')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mange Categories</h4>
                            <p class="card-description">
                                Add Category
                            </p>
                            <form method="POST" class="forms-sample" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Category</label>
                                    <select class="form-select" name="category[]" id="" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
