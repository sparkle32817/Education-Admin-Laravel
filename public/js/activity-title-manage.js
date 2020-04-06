$(document).ready(function() {
  let title_table = $("#act-title-table").DataTable({
    responsive: true,
    ajax: {
      "url": "/getActivityTitle"
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
                <a href="javascript:;" class="edit-title" e-id="` + data['id'] + `" e-text="` + data['name'] + `"><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="delete-title" d-id="` + data['id'] + `"><i class="mdi mdi-delete"></i></a>
                `;
      }
    }, ],
    "order": [
      [0, 'asc']
    ]
  });

  $("#act-title-table tbody").on("click", ".edit-title", function() {
    $('#modal1').modal('show');
    $('#modal1 #edit-title-id').val($(this).attr('e-id'));
    $('#modal1 #title-text').val($(this).attr('e-text'));
    $('#modal1 .modal-title').text('Edit Title');
    $('#modal1 .btn-title').text('Edit');
  });

  $("#act-title-table tbody").on("click", ".delete-title", function() {
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
          url: '/deleteActivityTitle',
          type: 'POST',
          data: {
            id: id,
            _token: _token
          },
          dataType: 'text',
          success: function(data) {
            if (data == "1") {
              swal("Deleted!", "Data has been deleted.", "success");
              title_table.ajax.reload();

              loadContentSelection();
            }
          }
        });
      } else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
      ) {}
    });
  });

  $("#modal1").on('hide.bs.modal', function() {
    $('#modal1 #edit-title-id').val('0');
    $('#modal1 #title-text').val('');
    $('#modal1 .modal-title').text('Add Title');
    $('#modal1 .btn-title').text('Add');

    $("#modal1").find(".alert").remove();
  });

  $('.form-title').on('submit', function(e) {
    e.preventDefault();

    let id = $('#edit-title-id').val();
    let text = $('#title-text').val();

    $.ajax({
      url: '/addActivityTitle',
      type: 'POST',
      data: {
        id: id,
        name: text,
        _token: _token
      },
      dataType: 'text',
      success: function(data) {
        if (data == "1") {
          title_table.ajax.reload();

          $('#modal1').modal('hide');

          loadContentSelection();
        } else if (data == -1) {
          showMessage($("#modal1").find("form").find(".modal-body"), "warning", "Title name is already existed!");
        }
      }
    });
  });
});