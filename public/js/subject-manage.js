$(document).ready(function() {
    let grade_id = 1,
        grade_text = '';

    loadSubjectSelection();

    $('#subject-table tbody').on('click', '.edit-subject', function() {
        $('#subject-modal').modal('show');
        $('#selected-grade-text').val(grade_text);
        $('#subject-modal #edit-subject-id').val($(this).attr('e-id'));
        $('#subject-modal #subject-text').val($(this).attr('e-text'));
        $('#subject-modal .modal-title').text('Edit Subject');
        $('#subject-modal .btn-subject').text('Edit');
    });

    $('#subject-table tbody').on('click', '.delete-subject', function() {
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
                    url: '/deleteSubject',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: 'text',
                    success: function(data) {
                        if (data == '1') {
                            swal('Deleted!', 'Your file has been deleted.', 'success');
                            subject_table.ajax.reload();
                        }
                    }
                });
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {}
        });
    });

    $('#btn-add-subject').on('click', function() {
        $('#selected-grade-text').val(grade_text);
    });

    $('#subject-modal').on('hide.bs.modal', function() {
        $('#subject-modal #edit-subject-id').val('0');
        $('#subject-modal #subject-text').val('');
        $('#subject-modal .modal-title').text('Add Subject');
        $('#subject-modal .btn-subject').text('Add');

        $('#subject-modal').find('.alert').remove();
    });

    $('.form-subject').on('submit', function(e) {
        e.preventDefault();

        let id = $('#edit-subject-id').val();
        let text = $('#subject-text').val();

        $.ajax({
            url: '/addSubject',
            type: 'POST',
            data: {
                id: id,
                grade_id: grade_id,
                name: text,
                _token: _token
            },
            dataType: 'text',
            success: function(data) {
                if (data == '1') {
                    subject_table.ajax.reload();

                    $('#subject-modal').modal('hide');
                } else if (data == -1) {
                    showMessage($('#subject-modal').find('form').find('.modal-body'), 'warning', 'Subject name is already existed!');
                }
            }
        });
    });

    $('#select-grade').on('change', function() {
        grade_id = $(this).val();
        grade_text = $("#select-grade option:selected").text();

        initializeTable($(this).val());
    });
});

/*
 * Functions
 */
//Load Grade for select
function loadSubjectSelection() {
    $.ajax({
        url: '/getGrade',
        method: 'get',
        dataType: 'json',
        async: false,
        success: function(response) {

            $('#select-grade').empty();

            $.each(response.data, function(i, data) {

                if (i == 0) {
                    grade_id = data.data.id;
                    grade_text = data.name;
                }

                $('#select-grade').append($('<option>', {
                    value: data.data.id,
                    text: data.name
                }));
            });

            initializeTable(grade_id);

        }
    });
}

//Load Subject Table
var subject_table = false,
    destroyed = false;

function initializeTable(id) {
    if (subject_table) {
        subject_table.clear().draw();
        subject_table.destroy();
        destroyed = true;
    }

    subject_table = $('#subject-table').DataTable({
        responsive: true,
        ajax: {
            'url': '/getSubject',
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
                            <a href='javascript:;' class='edit-subject' e-id='` + data['id'] + `' e-text='` + data['name'] + `'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;&nbsp;
                            <a href='javascript:;' class='delete-subject' d-id='` + data['id'] + `'><i class='mdi mdi-delete'></i></a>
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