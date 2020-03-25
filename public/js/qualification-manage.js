$(document).ready(function() {
    let qualification_table = $("#qualification-table").DataTable({
        responsive: true,
        ajax: {
            "url": "/getQualification"
        },
        columns: [
            { "data": 'cnt' },
            { "data": 'name' },
            { "data": 'data' },
        ],
        columnDefs: [{
            targets: -1,
            orderable: false,
            render: function(data) {
                return `
                        <a href="javascript:;" class="edit-qualification" e-id="` + data['id'] + `" e-text="` + data['name'] + `"><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="delete-qualification" d-id="` + data['id'] + `"><i class="mdi mdi-delete"></i></a>
                        `;
            }
        }, ],
        "order": [
            [0, 'asc']
        ]
    });

    $("#qualification-table tbody").on("click", ".edit-qualification", function() {
        $('#qualification-modal').modal('show');
        $('#qualification-modal #edit-qualification-id').val($(this).attr('e-id'));
        $('#qualification-modal #qualification-text').val($(this).attr('e-text'));
        $('#qualification-modal .modal-title').text('Edit Qualification');
        $('#qualification-modal .btn-qualification').text('Edit');
    });

    $("#qualification-table tbody").on("click", ".delete-qualification", function() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
        }).then(result => {
            if (result.value) {
                let id = $(this).attr('d-id');
                $.ajax({
                    url: '/deleteQualification',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: 'text',
                    success: function(data) {
                        if (data == "1") {
                            swal("Deleted!", "Data has been deleted.", "success");
                            qualification_table.ajax.reload();
                        }
                    }
                });
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {}
        });
    });

    $("#qualification-modal").on('hide.bs.modal', function() {
        $('#qualification-modal #edit-qualification-id').val('0');
        $('#qualification-modal #qualification-text').val('');
        $('#qualification-modal .modal-title').text('Add Qualification');
        $('#qualification-modal .btn-qualification').text('Add');

        $("#qualification-modal").find(".alert").remove();
    });

    $('.form-qualification').on('submit', function(e) {
        e.preventDefault();

        let id = $('#edit-qualification-id').val();
        let text = $('#qualification-text').val();

        $.ajax({
            url: '/addQualification',
            type: 'POST',
            data: {
                id: id,
                name: text,
                _token: _token
            },
            dataType: 'text',
            success: function(data) {
                if (data == "1") {
                    qualification_table.ajax.reload();

                    $('#qualification-modal').modal('hide');
                } else if (data == -1) {
                    showMessage($("#qualification-modal").find("form").find(".modal-body"), "warning", "Qualification name is already existed!");
                }
            }
        });
    });

    function showMessage(e, i, c) {
        var l = $('<div class="alert alert-' + i + ' alert-dismissible fade show add-category-message-type" role="alert">\n' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '<span aria-hidden="true">&times;</span>\n' +
            '</button>\n' +
            '<strong>' + c + '</strong>' +
            '</div>');
        l.prependTo(e);
    };
});