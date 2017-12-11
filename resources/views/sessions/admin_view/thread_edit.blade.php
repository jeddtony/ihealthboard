@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        @foreach($threads as $thread)
        <form action="/admin/threads/edit/{{$thread->id}}" method="POST" >
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" value="{{$thread->title}}">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <textarea name="body" id="ckview" class="form-control">{{$thread->body}}</textarea>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endforeach
        <script src="{{url('tinymce/jquery.tinymce.min.js')}}"></script>
        <script src="{{url('tinymce/tinymce.min.js')}}"></script>

        <script>
            tinymce.init({
                selector: "#ckview",theme: "modern",width: 680,height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: " | link unlink anchor | forecolor backcolor  | print preview code ",
                image_advtab: true ,

                external_filemanager_path:"{{url('tinymce/filemanager')}}/",
                filemanager_title:"Responsive Filemanager",
                external_plugins: { "filemanager" : "{{url('tinymce')}}/filemanager/plugin.min.js"}
            });
        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


        <!-- /.blog-post -->

@endsection
