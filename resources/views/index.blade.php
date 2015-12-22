@extends('layouts.app')

@section('content')
<div class="container spark-screen">
  <h1>Documents</h1>
  <div class="row border-row" style="margin-top: 3vh;">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-6">
          <a href="{{ route('documents-add') }}"><button class="btn btn-primary" type="button">Add Document</button></a>
        </div>
        <div class="custom-search-input">
          <div class="input-group col-xs-6">
            <form  role="form" method="GET" action="{{ url('/') }}">
              <div class="form-group has-feedback">
                <input type="text" name="search" class="form-control" placeholder="Search" />
                <i class="glyphicon glyphicon-search form-control-feedback"></i>
              </div>
              <input class="search-btn" type="submit" />
            </form>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <table class="table table-hover" >
          <thead>
            <tr>
              <th>Title</th>
              <th>Status</th>
              <th>Author</th>
              <th>Created Date</th>
              <th>Last Modified</th>
              @if ($user->is_boss == 0)
                <th></th>
              @endif
            </thead>
            <tbody>
              @foreach ($documents as $document)
              <tr>
                <td>{{ $document->name }}</td>
                @if ($document->status == "approved")
                <td class="status-app">
                @elseif ($document->status == "pre-request")
                <td class="status-pre">
                @elseif ($document->status == "declined")
                <td class="status-dec">
                @else ($document->status == "deleted")
                <td class="status-del">
                @endif
                {{ $document->status }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $document->created_at }}</td>
                <td>{{ $document->updated_at }}</td>
                @if ($user->is_boss == 0)
                <td>
                  <a href="/documents/edit/{{ $document->id }}" class="btn btn-warning btn-sm" role="button">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a href="/documents/delete/{{ $document->id }}" class="btn btn-danger btn-sm" role="button">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection

  <script type="text/javascript">

  $( document ).ready(function() {
    $('form').each(function() {
      $(this).find('input').keypress(function(e) {
        // Enter pressed?
        if(e.which == 10 || e.which == 13) {
          console.log("qwe");
          // this.form.submit();
        }
      });
    });
    $("#search-btn").find('input[type=submit]').hide();
  });
  </script>
