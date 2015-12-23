@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Document Detail</h1>
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
            <br>
            @if ($user->is_boss == 0)
            <div class="text-center">
              <a href="/documents/edit/{{ $document->id }}" class="btn btn-warning btn-lg">
                <span class="glyphicon glyphicon-pencil"></span>Edit
              </a>
              <a href="/documents/delete/{{ $document->id }}" class="btn btn-danger btn-lg" style="margin-left">
                <span class="glyphicon glyphicon-trash"></span>Delete
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>

      @endsection
