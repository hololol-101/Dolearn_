$(function() {
    // CKEditor load
    CKEDITOR.replace('editor', {
        height: 300,
        filebrowserUploadUrl: "{{ route('etc.file_upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
});
