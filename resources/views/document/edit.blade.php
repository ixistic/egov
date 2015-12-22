@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @if ($user->is_boss == 0)
                    {{ $documents }}
                    {{ $user }}
                  @endif
                  @if ($user->is_boss == 1)
                    {{ $documents }}
                    {{ $user }}
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
