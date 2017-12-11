@extends('layouts.master')

@section('content')
        <div class="col-sm-8 blog-main">
            <div class="blog-post row">
            <div class="col-md-6">
                <h2 class="blog-post-title">Topics </h2>
            </div>
            <div class="col-md-2">Tags</div>
            <div class="col-md-1">Replies</div>
            <div class="col-md-1">View</div>
            <div class="col-md-2">Activity</div>
            </div>
        <hr>
           @foreach($threads as $thread)
               @include('layouts.all_threads')
               <hr>
               @endforeach
           <!-- /.blog-post -->

@endsection

@if(auth()->check())

    @endif