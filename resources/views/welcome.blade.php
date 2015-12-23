@extends('layouts.app')

@section('content')
<style type="text/css">
#custom-search-input {
  margin:0;
  padding: 0;
}

#custom-search-input .search-query {
  padding-right: 3px;
  padding-right: 4px \9;
  padding-left: 3px;
  padding-left: 4px \9;
  /* IE7-8 doesn't have border-radius, so don't indent the padding */

  margin-bottom: 0;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

#custom-search-input button {
  border: 0;
  background: none;
  /** belows styles are working good */
  padding: 2px 5px;
  margin-top: 2px;
  position: relative;
  left: -28px;
  /* IE7-8 doesn't have border-radius, so don't indent the padding */
  margin-bottom: 0;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  color:#00bfff;
}

.search-query:focus + button {
  z-index: 3;
}

.border-row {
  padding-top: 20px;
  padding-bottom: 40px;
  padding-left: 20px;
  padding-right: 20px;
  background-color: rgba(255,255,255,0.8);
  border: 1px solid #e5e5e5;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
  box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
</style>

<div class="container">
  <h1>Upload Document</h1>
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-xs-2 col-xs-offset-2">Name</label>
          <div class="col-xs-6">
            <input class="form-control" type="text" name="name" id="name" id="name">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 col-xs-offset-2">File</label>
          <div class="col-xs-6">
            <input class="form-control" type="file" name="file" id="file" placeholder="No file ..." disabled>
          </div>
          <div class="col-xs-2">
            <button type="button" class="btn btn-primary">Browse</button>
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
            <button type="role" class="btn btn-primary btn-block">Upload</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>

@endsection
