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
                            <form method="POST" class="forms-sample" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputName1"
                                        placeholder="Name">
                                </div>


                                <div class="form-group">
                                    <label>Category Image</label>
                                    <div class="input-group col-xs-12">
                                        <input name="image" type="file" class="form-control" placeholder="Upload Image" value="{{ $category->image }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Notes</label>
                                    <input type="text" name="notes" value="{{ $category->notes }}" class="form-control" id="exampleInputName1"
                                        placeholder="Notes">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
