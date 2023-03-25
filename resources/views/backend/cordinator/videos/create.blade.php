@extends('backend.cordinator.index')


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Mange Videos</h4>
        <p class="card-description">
          Add Video
        </p>
        <form id="fileUploadForm" class="forms-sample" action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputName1" placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Number</label>
            <input type="number" name="number" class="form-control" id="exampleInputName1" placeholder="Number">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Video</label>
            <input id="select_file" type="file" name="video" class="form-control" id="exampleInputName1" placeholder="Number">
          </div>
          <div class="form-group">

            <div class="progress" id="progress_bar" style="display:none;height:50px; line-height: 50px;">

                <div class="progress-bar" id="progress_bar_process" role="progressbar" style="width:0%;">0%</div>

            </div>

        </div>
          <div class="form-group">
            <label for="exampleInputName1">image</label>
            <input type="file" name="image" class="form-control" id="exampleInputName2" placeholder="Number">
          </div>
        <div class="form-group">
            <label for="exampleInputName1">Category</label>
            <select name="category_id" class="form-select">
                <option disabled>select Category</option>
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

  <script>

    var file_element = document.getElementById('select_file');

    var progress_bar = document.getElementById('progress_bar');

    var progress_bar_process = document.getElementById('progress_bar_process');

    var uploaded_image = document.getElementById('uploaded_image');

    file_element.onchange = function(){

            var form_data = new FormData();

            form_data.append('sample_image', file_element.files[0]);

            form_data.append('_token', document.getElementsByName('_token')[0].value);

            progress_bar.style.display = 'block';

            var ajax_request = new XMLHttpRequest();

            ajax_request.open("POST", "{{ route('videos.store') }}");

            ajax_request.upload.addEventListener('progress', function(event){

                var percent_completed = Math.round((event.loaded / event.total) * 100);

                progress_bar_process.style.width = percent_completed + '%';

                progress_bar_process.innerHTML = percent_completed + '% completed';

            });

            ajax_request.addEventListener('load', function(event){

                var file_data = JSON.parse(event.target.response);

                uploaded_image.innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div><img src="'+file_data.image_path+'" class="img-fluid img-thumbnail" />';

                file_element.value = '';

            });

            ajax_request.send(form_data);

    };

    </script>
@endsection
