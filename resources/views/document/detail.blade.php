@extends('layouts.app')

@section('content')

<div class="container">
  @if ($user->is_boss == 1)
  <h1>Document Detail (BOSS)</h1>
  @else
  <h1>Document Detail</h1>
  @endif
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-4">
          <b>Name</b>
        </div>
        <div class="col-xs-8">
          {{ $document->name }}
        </div>
      </div>
      <hr class="divider"/>
      <div class="row">
        <div class="col-xs-4">
          <b>File</b>
        </div>
        <div class="col-xs-8">
          {{ $document->filename }}
          <a href="" type="button" class="btn btn-info btn-sm" style="margin-left:3vh;">
            <span class="glyphicon glyphicon-download-alt"></span> Download
          </a>
        </div>
      </div>
      <hr class="divider"/>
      <div class="row">
        <div class="col-xs-4">
          <b>Status</b>
        </div>
        @if ($document->status == "approved")
          <div class="col-xs-8 status-app">
        @elseif ($document->status == "pre-request")
          <div class="col-xs-8 status-pre">
        @elseif ($document->status == "declined")
          <div class="col-xs-8 status-dec">
        @else ($document->status == "deleted")
          <div class="col-xs-8 status-del">
        @endif
          {{ $document->status }}
          </div>
      </div>
      <hr class="divider"/>
      <div class="row">
        <div class="col-xs-4">
          <b>Description</b>
        </div>
        <div class="col-xs-8">
          {{ $document->description }}
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
      @if ($user->is_boss == 0)
        <form class="form-horizontal"role="form" method="POST" action="{{ route('documents-post') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="text-center">
            <a href="/documents/edit/{{ $document->id }}" class="btn btn-warning btn-lg">
              <span class="glyphicon glyphicon-pencil"></span>Edit
            </a>
            <a href="/documents/delete/{{ $document->id }}" class="btn btn-danger btn-lg" style="margin-left">
              <span class="glyphicon glyphicon-trash"></span>Delete
            </a>
          </div>
        </form>
      @else
        <form class="form-horizontal"role="form" method="POST" action="{{ route('documents-post') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-xs-12">
                <textarea class="form-control" rows="5" placeholder="Enter feedback"></textarea>
            </div>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">
                <span class="glyphicon glyphicon-ok"></span> &nbsp;&nbsp;Approve
            </button>
            <a href="#" class="btn btn-danger btn-lg" style="margin-left">
                <span class="glyphicon glyphicon-remove"></span>  &nbsp;&nbsp;Decline
            </a>
          </div>
        </from>
      @endif
    </div>
  </div>
</div>
@endsection
