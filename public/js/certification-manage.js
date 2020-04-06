$(document).ready(function() {
  let certification_table = $("#certification-table").DataTable({
    responsive: true,
    ajax: {
      "url": "/getCertification"
    },
    columns: [{
        "data": 'cnt'
      },
      {
        "data": 'name'
      },
      {
        "data": 'data'
      },
    ],
    columnDefs: [{
      targets: -1,
      orderable: false,
      render: function(data) {
        return `
                <a href="javascript:;" class="edit-certification" e-id="` + data['id'] + `" e-text="` + data['name'] + `"><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="delete-certification" d-id="` + data['id'] + `"><i class="mdi mdi-delete"></i></a>
                `;
      }
    }, ],
    "order": [
      [0, 'asc']
    ]
  });

  $("#certification-table tbody").on("click", ".edit-certification", function() {
    $('#certification-modal').modal('show');
    $('#certification-modal #edit-certification-id').val($(this).attr('e-id'));
    $('#certification-modal #certification-text').val($(this).attr('e-text'));
    $('#certification-modal .modal-title').text('Edit Certification');
    $('#certification-modal .btn-certification').text('Edit');
  });

  $("#certification-table tbody").on("click", ".delete-certification", function() {
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
          url: '/deleteCertification',
          type: 'POST',
          data: {
            id: id,
            _token: _token
          },
          dataType: 'text',
          success: function(data) {
            if (data == "1") {
              swal("Deleted!", "Data has been deleted.", "success");
              certification_table.ajax.reload();
            }
          }
        });
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {}
    });
  });

  $("#certification-modal").on('hide.bs.modal', function() {
    $('#certification-modal #edit-certification-id').val('0');
    $('#certification-modal #certification-text').val('');
    $('#certification-modal .modal-title').text('Add Certification');
    $('#certification-modal .btn-certification').text('Add');

    $("#certification-modal").find(".alert").remove();
  });

  $('.form-certification').on('submit', function(e) {
    e.preventDefault();

    let id = $('#edit-certification-id').val();
    let text = $('#certification-text').val();

    $.ajax({
      url: '/addCertification',
      type: 'POST',
      data: {
        id: id,
        name: text,
        _token: _token
      },
      dataType: 'text',
      success: function(data) {
        if (data == "1") {
          certification_table.ajax.reload();

          $('#certification-modal').modal('hide');
        } else if (data == -1) {
          showMessage($("#certification-modal").find("form").find(".modal-body"), "warning", "Certification name is already existed!");
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