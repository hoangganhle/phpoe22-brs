$(document).on('click', '.edit-modal', function () {
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Status Edit');
    $('#footer_action_button').text(" Update ");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('#myModal').modal();
    $.ajax({
        type: 'get',
        url: '/cp-admin/editbook/' + $(this).attr("data-id") + '/edit',
        success: function(data) {
            $('#book_name').val(data.bookInfo.book_name);
            $('#request_content').val(data.bookInfo.request_content);
            $('#user_id').val(data.user_name);
            $('#status').val(data.bookInfo.status);
            $('.modal-footer').attr('id', data.bookInfo.id);
        }
    });
});

$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PATCH',
        url: '/cp-admin/editbook/' + $('.modal-footer').attr("id") ,
        data: {
            '_token': $('input[name=_token]').val(),
            'book_name': $("#book_name").val(),
            'request_content': $("#request_content").val(),
            'user_id': $("#user_id").val(),
            'status': $("#status").val(),
        },
        success: function(data) {
            $('.odd' + data['id']).html(data['returnHTML']);
        }
    });
});
