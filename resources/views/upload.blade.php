@extends('layouts.app')

@section('content')
<div class="container spark-screen">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
      </form>
    </div>
  </div>
</div>
@endsection
