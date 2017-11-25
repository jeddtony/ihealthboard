<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>iHealthBoard</title>


    <!-- Custom styles for this template -->
    {{--<link href="blog.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>

<body>

<div class="blog-masthead">
    <div class="container">
        @if(auth()->check())
            @include('layouts.nav_user')
        @else
            @include('layouts.nav_guest')
        @endif
    </div>
</div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
</div>

<div class="container">

    <div class="row">

        {{--THIS SHOULD CONTAIN THE CONTENT--}}
        @yield('content')

        {{--<nav class="blog-pagination">--}}
            {{--<a class="btn btn-outline-primary" href="#">Older</a>--}}
            {{--<a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
        {{--</nav>--}}

@if(!isset($page))
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="/" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="/page/1">1</a></li>
                <li class="page-item"><a class="page-link" href="/page/2">2</a></li>
                <li class="page-item"><a class="page-link" href="/page/3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="">Next</a>
                </li>
            </ul>
        </nav>

    @else
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item ">
                    <a class="page-link" href="/page/{{$page-1}}" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="/page/1">1</a></li>
                <li class="page-item"><a class="page-link" href="/page/2">2</a></li>
                <li class="page-item"><a class="page-link" href="/page/3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="/page/{{$page+1}}">Next</a>
                </li>
            </ul>
        </nav>

    @endif

        @if(!auth()->check())
        <form>
            {{csrf_field()}}
            <div class="form-group">
                <label for=""></label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Ask your question">
                <small id="helpId" class="form-text text-muted">If you are not signed in it will take a while for your question to be answered</small>
            </div>
        </form>
            @endif
    </div><!-- /.blog-main -->

    <div class="col-sm-3 offset-sm-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
        <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
            </ol>
        </div>s
        <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
        </div>
    </div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>