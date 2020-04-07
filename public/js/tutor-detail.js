$(document).ready(function() {
  let membershipOrigin = $('#membership').val();
  let expireDateOrigin = $('#expire_date').val();
  // Date Picker
  $('#expire_date').datepicker({
    autoclose: true,
    clearBtn: true,
    format: 'yyyy-mm-d',
    startDate: new Date(),
    todayHighlight: true
  });

  $('#membership').on('change', function() {
    if ($(this).val() == 0) {
      $('#expire_date').prop('disabled', true);
      $('#expire_date').val('');
    } else {
      $('#expire_date').prop('disabled', false);
    }
  });

  $('#btnReset').on('click', function() {
    $('#membership').val(membershipOrigin);
    $('#expire_date').val(expireDateOrigin);
    if (membershipOrigin != 0) {
      $('#expire_date').prop('disabled', false);
    }
  });

  $('#btnEdit').on('click', function() {
    if ($(this).text() == 'Edit') {
      $('#membership, #expire_date').prop('disabled', false);
      $('#btnReset').prop('disabled', false);
      $(this).text('Save');
    } else {
      let membership = $('#membership').val();
      let expireDate = $('#expire_date').val();
      if (membership == 1 && expireDate == '') {
        showMessage($(this).closest('form').find('.col-md-7'), 'warning', 'Please set Expiry Date');
        return;
      }

      $.ajax({
        url: '/editTutorInfo',
        type: 'POST',
        data: {
          id: $('#id').val(),
          membership: membership,
          expireDate: expireDate,
          _token: _token
        },
        dataType: 'text',
        success: function(data) {
          membershipOrigin = $('#membership').val();
          expireDateOrigin = $('#expire_date').val();
          $('#membership, #expire_date').prop('disabled', true);
          $('#btnReset').prop('disabled', true);
          $(this).text('Edit');
        }
      });

    }
  });

});

function showMessage(e, i, c) {
  var l = $('<div class="alert alert-' + i + ' alert-dismissible fade show add-category-message-type" role="alert" style="margin: 10px 0 0 0;">\n' +
    '<strong>' + c + '</strong>' +
    '<span class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</span>\n' +
    '</div>');
  l.prependTo(e);
};