$(document).ready(function() {
    let location_table = $("#location-table").DataTable({
        responsive: true,
        ajax: {
            "url": "/getLocation"
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
                        <a href="javascript:;" class="edit-location" e-id="` + data['id'] + `" e-text="` + data['name'] + `"><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="javascript:;" class="delete-location" d-id="` + data['id'] + `"><i class="mdi mdi-delete"></i></a>
                        `;
            }
        }, ],
        "order": [
            [0, 'asc']
        ]
    });

    $("#location-table tbody").on("click", ".edit-location", function() {
        $('#location-modal').modal('show');
        $('#location-modal #edit-id').val($(this).attr('e-id'));
        $('#location-modal #location-text').val($(this).attr('e-text'));
        $('#location-modal .modal-title').text('Edit Location');
        $('#location-modal .btn-location').text('Edit');
    });

    $("#location-table tbody").on("click", ".delete-location", function() {
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
                    url: '/deleteLocation',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: _token
                    },
                    dataType: 'text',
                    success: function(data) {
                        if (data == "1") {
                            swal("Deleted!", "Data has been deleted.", "success");
                            location_table.ajax.reload();
                        }
                    }
                });
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {}
        });
    });

    $("#location-modal").on('hide.bs.modal', function() {
        $('#location-modal #edit-id').val('0');
        $('#location-modal #location-text').val('');
        $('#location-modal .modal-title').text('Add Location');
        $('#location-modal .btn-location').text('Add');

        $("#location-modal").find(".alert").remove();
    });

    $('.form-location').on('submit', function(e) {
        e.preventDefault();

        let id = $('#edit-id').val();
        let text = $('#location-text').val();

        $.ajax({
            url: '/addLocation',
            type: 'POST',
            data: {
                id: id,
                name: text,
                _token: _token
            },
            dataType: 'text',
            success: function(data) {
                if (data == "1") {
                    location_table.ajax.reload();

                    $('#location-modal').modal('hide');
                } else if (data == -1) {
                    showMessage($("#location-modal").find("form").find(".modal-body"), "warning", "Location name is already existed!");
                }
            }
        });
    });
});