@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Upload document</div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{ url('/upload') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <label class="col-md-3" for="fileName">Name</label>
                <input class="col-md-6" type="text" name="fileName" id="fileName">
              </div>
              <div class="row">
                <label class="col-md-3" for="fileToUpload">File</label>
                <input class="col-md-6" type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <div class="row">
                <label class="col-md-3" for="fileDesc">File description</label>
                <textarea class="col-md-6 file-desc"type="text-area" name="fileDesc" id="fileDesc"></textarea>
              </div>
              <input class="col-md-6 col-md-offset-3 btn btn-primary" type="submit" value="Upload file" name="submit">
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
