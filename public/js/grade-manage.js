$(document).ready(function() {
  let grade_table = $("#grade-table").DataTable({
    responsive: true,
    ajax: {
      "url": "/getGrade"
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
                <a href="javascript:;" class="edit-grade" e-id="` + data['id'] + `" e-text="` + data['name'] + `"><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="delete-grade" d-id="` + data['id'] + `"><i class="mdi mdi-delete"></i></a>
                `;
      }
    }, ],
    "order": [
      [0, 'asc']
    ]
  });

  $("#grade-table tbody").on("click", ".edit-grade", function() {
    $('#grade-modal').modal('show');
    $('#grade-modal #edit-id').val($(this).attr('e-id'));
    $('#grade-modal #grade-text').val($(this).attr('e-text'));
    $('#grade-modal .modal-title').text('Edit Grade');
    $('#grade-modal .btn-grade').text('Edit');
  });

  $("#grade-table tbody").on("click", ".delete-grade", function() {
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
          url: '/deleteGrade',
          type: 'POST',
          data: {
            id: id,
            _token: _token
          },
          dataType: 'text',
          success: function(data) {
            if (data == "1") {
              swal("Deleted!", "Data has been deleted.", "success");
              grade_table.ajax.reload();

              loadSubjectSelection();
            }
          }
        });
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {}
    });
  });

  $("#grade-modal").on('hide.bs.modal', function() {
    $('#grade-modal #edit-id').val('0');
    $('#grade-modal #grade-text').val('');
    $('#grade-modal .modal-title').text('Add Grade');
    $('#grade-modal .btn-grade').text('Add');

    $("#grade-modal").find(".alert").remove();
  });

  $('.form-grade').on('submit', function(e) {
    e.preventDefault();

    let id = $('#edit-id').val();
    let text = $('#grade-text').val();

    $.ajax({
      url: '/addGrade',
      type: 'POST',
      data: {
        id: id,
        name: text,
        _token: _token
      },
      dataType: 'text',
      success: function(data) {
        if (data == "1") {
          grade_table.ajax.reload();

          $('#grade-modal').modal('hide');

          loadSubjectSelection();
        } else if (data == -1) {
          showMessage($("#grade-modal").find("form").find(".modal-body"), "warning", "Grade name is already existed!");
        }
      }
    });
  });
});