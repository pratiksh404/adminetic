<script>
    // Heavy Text Editor
    CKEDITOR.replace('heavytexteditor', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
        width: '100%'
    });

</script>
