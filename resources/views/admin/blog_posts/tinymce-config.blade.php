{{-- resources/views/admin/partials/tinymce-config.blade.php --}}
<script src="https://cdn.tiny.cloud/1/oar18yrabgr1ca4cfieet5ferz7mdkwhshebzhqixjn1ztio/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template paste textpattern',
        toolbar: 'code | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        toolbar_mode: 'floating',
        height: 300,
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });
</script>
