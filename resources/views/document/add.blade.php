@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Upload Document</h1>
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <form class="form-horizontal"role="form" method="POST" action="{{ route('documents-post') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label class="col-xs-2 col-xs-offset-2">Name</label>
          <div class="col-xs-6">
            <input class="form-control" type="text" name="name" id="name">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 col-xs-offset-2">File</label>
          <div class="col-xs-6">
            <input class="form-control" type="file" name="file" id="file" placeholder="No file ...">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 col-xs-offset-2">Description</label>
          <div class="col-xs-6">
            <textarea class="form-control file-desc"type="text-area" rows="5" name="description" id="description"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-xs-offset-4">
            <button type="submit" class="btn btn-info btn-lg btn-block">
              <span class="glyphicon glyphicon-upload"></span> Upload
            </a>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>

@endsection
