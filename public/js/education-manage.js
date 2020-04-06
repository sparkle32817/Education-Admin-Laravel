$(document).ready(function() {
  let flag = false;
  $("#datatable").DataTable({
    responsive: true,
    ajax: {
      "url": "/getAllEducationData"
    },
    columns: [{
        "data": 'id'
      },
      {
        "data": 'name'
      },
      {
        "data": 'email'
      },
      {
        "data": 'phone'
      },
      {
        "data": 'address'
      },
      {
        "data": 'grade'
      },
      {
        "data": 'subject'
      },
      {
        "data": 'activity'
      },
      {
        "data": 'activatedStatus'
      },
      {
        "data": 'id'
      },
    ],
    columnDefs: [{
      targets: -2,
      orderable: false,
      render: function(data) {
        let checkStatus = data.status == 1 ? 'checked' : '';
        return `<input type="checkbox" class="approve-switch" e-id="` + data.id + `" data-color="#009efb" data-secondary-color="#f62d51" ` + checkStatus + `/>`;
      }
    }, {
      targets: -1,
      orderable: false,
      render: function(id) {
        let url = "/educationDetail/?id=" + id;
        return `
                <!-- <a href=""><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp; -->
                <a href="` + url + `"><i class="mdi mdi-eye"></i></a>
                `;
      }
    }],
    "order": [
      [0, 'asc']
    ],
    "initComplete": function(settings, json) {
      $('.approve-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
      $('.approve-switch').on('change', function() {
        if (flag) return (flag = false);
        let switchBtn = $(this);
        swal({
          title: "Are you sure?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Aprrove this!",
        }).then(result => {
          if (result.value) {
            $.ajax({
              url: '/changeEducationStatus',
              type: 'POST',
              data: {
                id: switchBtn.attr('e-id'),
                status: switchBtn.is(":checked") ? 1 : 0,
                _token: _token
              },
              dataType: 'text',
              success: function(data) {
                console.log("data", data);
              }
            });
          } else if (
            result.dismiss === swal.DismissReason.cancel
          ) {
            flag = true;
            switchBtn.click();
          }
        });
      });
    }
  });

});