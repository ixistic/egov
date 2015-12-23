@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Edit Document</h1>
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <form role="form" method="POST" action="{{ route('documents-edit-post',$documents->id) }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-xs-4">
            <b>Name</b>
          </div>
          <div class="col-xs-6">
            <input class="form-control" type="text" name="name" id="name" value="{{ $documents->name }}">
          </div>
        </div>
        <hr class="divider"/>
        <div class="row">
          <div class="col-xs-4">
            <b>File</b>
          </div>
          <div class="col-xs-6">
            {{$documents->filename}}<br><br>
            <input class="form-control" type="file" name="file" id="file">
          </div>
        </div>
        <hr class="divider"/>
        <div class="row">
          <div class="col-xs-4">
            <b>Status</b>
          </div>
          <div class="col-xs-8">
            @if ($documents->status == "approved")
            <div class="status-app">
            @elseif ($documents->status == "pre-request")
            <div class="status-pre">
            @elseif ($documents->status == "declined")
            <div class="status-dec">
            @else ($documents->status == "deleted")
            <div class="status-del">
            @endif
            {{ $documents->status }}
            </div>
          </div>
        </div>
        <hr class="divider"/>
        <div class="row">
          <div class="col-xs-4">
            <b>Description</b>
          </div>
          <div class="col-xs-6">
            <textarea class="form-control" type="text" rows="5" name="description" id="description">{{ $documents->description }}</textarea>
          </div>
        </div>
        <hr class="divider"/>
        <div class="text-center">
          <button type="submit" href="/documents/edit/post" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-pencil"></span>Save
          </button>
          <a class="btn btn-danger btn-lg" style="margin-left" onclick="window.history.back();">
            <span class="glyphicon glyphicon-remove"></span>Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
