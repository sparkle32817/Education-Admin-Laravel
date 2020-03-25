$(document).ready(function() {
    let title_id = 1,
        title_text = '';

    loadContentSelection();

    $('#act-content-table tbody').on('click', '.edit-content', function() {
        $('#modal2').modal('show');
        $('#selected-title-text').val(title_text);
        $('#modal2 #edit-content-id').val($(this).attr('e-id'));
        $('#modal2 #content-text').val($(this).attr('e-text'));
        $('#modal2 .modal-title').text('Edit Content');
        $('#modal2 .btn-content').text('Edit');
    });

    $('#act-content-table tbody').on('click', '.delete-content', function() {
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
        }).then(result => {
            if (result.value) {
                let id = $(this).attr('d-id');
                $.ajax({
                    url: '/deleteActivityContent',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: 'text',
                    success: function(data) {
                        if (data == '1') {
                            swal('Deleted!', 'Your file has been deleted.', 'success');
                            content_table.ajax.reload();
                        }
                    }
                });
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {}
        });
    });

    $('#btn-add-content').on('click', function() {
        $('#selected-title-text').val(title_text);
    });

    $('#modal2').on('hide.bs.modal', function() {
        $('#modal2 #edit-content-id').val('0');
        $('#modal2 #content-text').val('');
        $('#modal2 .modal-title').text('Add Content');
        $('#modal2 .btn-content').text('Add');

        $('#modal2').find('.alert').remove();
    });

    $('.form-content').on('submit', function(e) {
        e.preventDefault();

        let id = $('#edit-content-id').val();
        let text = $('#content-text').val();

        $.ajax({
            url: '/addActivityContent',
            type: 'POST',
            data: {
                id: id,
                title_id: title_id,
                name: text,
                _token: _token
            },
            dataType: 'text',
            success: function(data) {
                if (data == '1') {
                    content_table.ajax.reload();

                    $('#modal2').modal('hide');
                } else if (data == -1) {
                    showMessage($('#modal2').find('form').find('.modal-body'), 'warning', 'Content name is already existed!');
                }
            }
        });
    });

    $('#select-act-title').on('change', function() {
        title_id = $(this).val();
        title_text = $("#select-act-title option:selected").text();

        initializeTable($(this).val());
    });
});

/*
 * Functions
 */
//Load Title for select
function loadContentSelection() {
    $.ajax({
        url: '/getActivityTitle',
        method: 'get',
        dataType: 'json',
        async: false,
        success: function(response) {

            $('#select-act-title').empty();

            $.each(response.data, function(i, data) {

                if (i == 0) {
                    title_id = data.data.id;
                    title_text = data.name;
                }

                $('#select-act-title').append($('<option>', {
                    value: data.data.id,
                    text: data.name
                }));
            });

            initializeTable(title_id);

        }
    });
}

//Load Content Table
var content_table = false,
    destroyed = false;

function initializeTable(id) {
    if (content_table) {
        content_table.clear().draw();
        content_table.destroy();
        destroyed = true;
    }

    content_table = $('#act-content-table').DataTable({
        responsive: true,
        ajax: {
            'url': '/getActivityContent',
            'type': 'post',
            'data': { id: id, _token: _token }
        },
        columns: [
            { 'data': 'cnt' },
            { 'data': 'name' },
            { 'data': 'data' },
        ],
        columnDefs: [{
            targets: -1,
            orderable: false,
            render: function(data) {
                return `
                            <a href='javascript:;' class='edit-content' e-id='` + data['id'] + `' e-text='` + data['name'] + `'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;&nbsp;
                            <a href='javascript:;' class='delete-content' d-id='` + data['id'] + `'><i class='mdi mdi-delete'></i></a>
                            `;
            }
        }, ],
        'order': [
            [0, 'asc']
        ]
    });

}

function showMessage(e, i, c) {
    var l = $('<div class="alert alert-' + i + ' alert-dismissible fade show add-category-message-type" role="alert">\n' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
        '<span aria-hidden="true">&times;</span>\n' +
        '</button>\n' +
        '<strong>' + c + '</strong>' +
        '</div>');
    l.prependTo(e);
};