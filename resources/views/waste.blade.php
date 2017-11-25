{{--file_browser_callback : function(field_name, url, type, win) {--}}
{{--var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;--}}
{{--var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;--}}

{{--var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;--}}
{{--if (type == 'image') {--}}
{{--cmsURL = cmsURL + "&type=Images";--}}
{{--} else {--}}
{{--cmsURL = cmsURL + "&type=Files";--}}
{{--}--}}

{{--tinyMCE.activeEditor.windowManager.open({--}}
{{--file : cmsURL,--}}
{{--title : 'Filemanager',--}}
{{--width : x * 0.8,--}}
{{--height : y * 0.8,--}}
{{--resizable : "yes",--}}
{{--close_previous : "no"--}}
{{--});--}}
{{--}--}}



<div class="col-md-6">
    <h2>CKEditor</h2>
    <textarea name="ce" class="form-control"></textarea>
</div>



<div class="row">
    <div class="col-md-6">
        <h2>Summernote</h2>
        <textarea id="summernote-editor" name="content"></textarea>
    </div>
    <div class="col-md-6">
        <h2>Standalone Image Button</h2>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
            <input id="thumbnail" class="form-control" type="text" name="filepath">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
        <h2>Standalone File Button</h2>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
            <input id="thumbnail2" class="form-control" type="text" name="filepath">
        </div>
        <img id="holder2" style="margin-top:15px;max-height:100px;">
    </div>
</div>




<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    $('textarea[name=ce]').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
</script>



<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
</script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script>
    $(document).ready(function(){

        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote-editor').summernote({
            toolbar: [
                ['popovers', ['lfm']],
            ],
            buttons: {
                lfm: LFMButton
            }
        })
    });
</script>