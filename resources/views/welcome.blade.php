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

<div class="container spark-screen">
     <div class="row border-row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-6">
                    <input class="btn btn-primary" type="button" value="Add Document">
                </div>
                <div id="custom-search-input">
                    <div class="input-group col-xs-6">
                         <input type="text" class="search-query form-control " placeholder="Search" />
                             <span class="input-group-btn">
                                <button class="btn" type="button">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover" style="margin-top:5vh;">
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
                        <tr>
                            <td>Document1</td>
                            <td>Pre-request</td>
                            <td>Officer1</td>
                            <td>12 Nov 2015</td>
                            <td>22 Dec 2015</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Document2</td>
                            <td>Approved</td>
                            <td>Officer2</td>
                            <td>1 Nov 2015</td>
                            <td>10 Dec 2015</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span> 
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
