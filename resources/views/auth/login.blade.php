@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3">
                <div class="input-group">
                  <span class="input-group-addon glyphicon-user glyphicon"></span>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address">
                </div>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3">
                <div class="input-group">
                  <span class="input-group-addon glyphicon-lock glyphicon"></span>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i>Login
                </button>

                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
