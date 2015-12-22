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
          <b>Description</b>
        </div>
        <div class="col-xs-8">
          <textarea type="text" name="name" id="name">{{ $documents->description }}</textarea>
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
        <a href="/documents/edit/post" class="btn btn-success btn-lg">
          <span class="glyphicon glyphicon-pencil"></span>Save
        </a>
        <a href="/documents/delete/{{ $documents->id }}" class="btn btn-danger btn-lg" style="margin-left">
          <span class="glyphicon glyphicon-trash"></span>Delete
        </a>
      </div>
    </div>
  </div>
</div>
