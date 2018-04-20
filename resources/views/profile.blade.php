@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<br><br>
<div  class="row justify-content-center">
<div class="container-fluid well col-sm-10">
	<div class="row-fluid">
        <div class="container">
            <div class="row">
            <div class="col-sm-4" >
                <img width=400 src="https://secure.gravatar.com/avatar/de9b11d0f9c0569ba917393ed5e5b3ab?s=140&r=g&d=mm" class="img-circle">
            </div>
        
            <div class="col-sm-8" >
                User Name<br>
                Email: MyEmail@servidor.com<br>
                Ubication: Colombia<br>
                Old: 1 Year<br>
                <a href="#">More... </a>
            </div>
            </div>
        </div>
        <div >
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>


@endsection