@extends('layouts.app')

@section('content')


<div class="container spark-screen">
  <h1>Documents</h1>
  <div class="row border-row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-6">
          <a href="{{ route('documents-add') }}"><button class="btn btn-primary" type="button">Add Document</button></a>
        </div>
        <div class="custom-search-input">
          <div class="input-group col-xs-6">
            <form  role="form" method="POST" action="{{ url('/upload') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Search" />
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
              <th></th>
            </thead>
            <tbody>
              {{--@foreach ($users as $user)
                <tr>
                  <td></td>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->id }}</td>
                  <td>
                    <a href="" class="btn btn-warning btn-sm" role="button">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="" class="btn btn-danger btn-sm" role="button">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
                --}}

                <tr>
                  <td>Document2</td>
                  <td>Approved</td>
                  <td>Officer2</td>
                  <td>1 Nov 2015</td>
                  <td>10 Dec 2015</td>
                  <td>

                    <a href="" class="btn btn-warning btn-sm" role="button">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="" class="btn btn-danger btn-sm" role="button">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
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
