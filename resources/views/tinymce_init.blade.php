
<script src="{{ URL::asset('vendor/tcg/voyager/assets/js/tinymce/tinymce.min.js') }}"></script>

    <script>tinymce.init({
        selector:'textarea',
        language:"{{ app()->getLocale() }}",
        plugins: "code image imagetools link table autosave hr paste preview",
        toolbar : "undo redo | styleselect | bold italic underline removeformat | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent imageupload",
        setup: function(editor) {
    var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
    $(editor.getElement()).parent().append(inp);

    inp.on("change",function(){
        var input = inp.get(0);
        var file = input.files[0];
        var fr = new FileReader();
        fr.onload = function() {
            var img = new Image();
            img.src = fr.result;
            editor.insertContent('<img src="'+img.src+'"/>');
            inp.val('');
        }
                fr.readAsDataURL(file);
            });

    editor.addButton( 'imageupload', {
                text:"{{ trans('site.upload_image') }}",
                icon: false,
                onclick: function(e) {
        inp.trigger('click');
    }
            });
        }
    });</script>
