@extends('layouts.master')

@section('content')
        <div class="col-sm-8 blog-main">

           @foreach($threads as $thread)
               @include('layouts.all_threads')
               @endforeach
           <!-- /.blog-post -->

@endsection

@if(auth()->check())

    @endif