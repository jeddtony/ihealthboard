<div class="blog-post row">
    {{--<h2 class="blog-post-title">--}}
        {{--<a href="/threads/{{$thread->id}}">{{$thread->title}}</a> </h2>--}}
    {{--<p class="blog-post-meta">{{$thread->created_at->diffForHumans()}} <a href="#">Mark</a></p>--}}

    <div class="col-md-6">
        <h2 class="blog-post-title"><a href="/threads/{{$thread->id}}"> {{$thread->title}}</a> </h2>
        <h4>by {{$thread->user->name}}</h4>
    </div>
    <div class="col-md-2">
        {{--{{$thread->tags['name']}}--}}
        @foreach($thread->tags as $tag)
            {{$tag->name}}
            @endforeach
    </div>
<div class="col-md-1">{{count($thread->comments)}}</div>
    <div class="col-md-1">{{$thread->number_of_views}}</div>
    <div class="col-md-2">{{$thread->created_at->diffForHumans()}}</div>

</div>