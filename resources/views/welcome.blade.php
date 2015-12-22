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
    <h1>Document Detail</h1>
     <div class="row border-row" style="margin-top: 3vh;">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-4">
                    <b>Name</b>
                </div>
                <div class="col-xs-8">
                    Document1
                </div>
            </div>
            <hr class="divider"/>
            <div class="row">
                <div class="col-xs-4">
                    <b>File</b>
                </div>
                <div class="col-xs-8">
                    Document1.pdf 
                    <button type="button" class="btn btn-info btn-sm" style="margin-left:3vh;">
                        <span class="glyphicon glyphicon-download-alt"></span> Download
                    </button>
                </div>
            </div>
            <hr class="divider"/>
            <div class="row">
                <div class="col-xs-4">
                    <b>Description</b>
                </div>
                <div class="col-xs-8">
                    Document description
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
                <strong>Boss</strong>
                <span class="glyphicon glyphicon-pencil pull-right"></span>
                <br>
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <small>22/12/2015</small>
                </blockquote>
            </div>
            <br>
            <div class="text-center">
                <a href="#" class="btn btn-warning btn-lg">
                    <span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp;Edit 
                </a>
                <a href="#" class="btn btn-danger btn-lg" style="margin-left">
                    <span class="glyphicon glyphicon-trash"></span>  &nbsp;&nbsp;Delete 
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
