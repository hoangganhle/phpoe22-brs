$(document).ready(function() {
    $(document).on("click", ".reply_btn", function() {
        $('.reply').hide();
        var id = $(this).attr('id');
        $('#reply' + id).show();
    });

});
CKEDITOR.replace('summary-ckeditor', {
    filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
    filebrowserUploadMethod: 'form',
});

$(document).ready(function() {
    $('#sampleTable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "pagingType": "full_numbers",
    } );
} );
