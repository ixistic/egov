@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Document Detail</h1>
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <form role="form" method="POST" action="{{ route('documents-edit-post',$documents->id) }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-xs-4">
            <b>Name</b>
          </div>
          <div class="col-xs-8">
            <input class="col-md-6" type="text" name="name" id="name" value="{{ $documents->name }}">
          </div>
        </div>
        <hr class="divider"/>
        <div class="row">
          <div class="col-xs-4">
            <b>File</b>
          </div>
          <div class="col-xs-8">
            <input type="file" name="file" id="file">
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
          <div class="col-xs-8">
            <textarea type="text" name="description" id="description">{{ $documents->description }}</textarea>
          </div>
        </div>
        <hr class="divider"/>
        <div class="row">
          <div class="col-xs-4">
            <b>Feedback</b>
          </div>
          <div class="col-xs-8"></div>
        </div>
        <br>
        <div class="well">
          <strong>Boss</strong><br>
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>22/12/2015</small>
          </blockquote>
        </div>
        <br>
        <div class="text-center">
          <button type="submit" href="/documents/edit/post" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-pencil"></span>Save
          </button>
          <a href="/documents/delete/{{ $documents->id }}" class="btn btn-danger btn-lg" style="margin-left">
            <span class="glyphicon glyphicon-trash"></span>Delete
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
