<nav class="navbar navbar-toggleable-md navbar-light fixed-top bg-faded">
    <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">iHealthBoard</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Forum <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Blog</a>
            <a class="nav-item nav-link" href="/user_dashboard">Dashboard</a>
            <a class="nav-item nav-link" href="/create-thread">Create thread</a>
            <a class="nav-item nav-link" href="#">Create blog</a>
            <a class="nav-item nav-link " href="/logout">Sign out</a>
            @if(auth()->check())
            <a class="nav-item nav-link ml-auto " href="#">{{auth()->user()->name}}</a>
@endif
        </div>
    </div>
</nav>
