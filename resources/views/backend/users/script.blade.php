<script>
  $(function () {
    $('.edit').click(function () {
      let id = $(this).data('id');
      let url = "{{ route('api.users.show', 'id') }}";
      url = url.replace('id', id);

      let updateUrl = "{{ route('backend.users.update', 'id') }}";
      updateUrl = updateUrl.replace('id', id);

      let inputButton = $('#editUserModal input').not('input[name=_token], input[name=_method]').prop('disabled', true);
      let buttonSubmit = $('#editUserModal .modal-footer button[type=submit]').prop('disabled', true);

      $('#editUserModal input')
        .not('input[name=_token], input[name=_method], input[name=password], input[name=password_confirmation]')
        .val('Sedang mengambil data..');

      $.ajax({
        url: url,
        success: function (res) {
          inputButton.prop('disabled', false);
          buttonSubmit.prop('disabled', false);

          $('#editUserModal form').attr('action', updateUrl);

          $('#editUserModal #name').val(res.data.name);
          $('#editUserModal #email').val(res.data.email);
        }
      })
    });

    $('#addUserModal #show-password').click(function () {
      let input = $('#addUserModal #password');

      if (input.attr('type') == 'password') {
        input.attr('type', 'text');
        $('#addUserModal #eye').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        input.attr('type', 'password');
        $('#addUserModal #eye').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });

    $('#addUserModal #show-password-confirmation').click(function () {
      let input = $('#addUserModal #password_confirmation');

      if (input.attr('type') == 'password') {
        input.attr('type', 'text');
        $('#addUserModal #eye-password-confirmation').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        input.attr('type', 'password');
        $('#addUserModal #eye-password-confirmation').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });

    $('#editUserModal #show-password').click(function () {
      let input = $('#editUserModal #password');

      if (input.attr('type') == 'password') {
        input.attr('type', 'text');
        $('#editUserModal #eye').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        input.attr('type', 'password');
        $('#editUserModal #eye').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });

    $('#editUserModal #show-password-confirmation').click(function () {
      let input = $('#editUserModal #password_confirmation');

      if (input.attr('type') == 'password') {
        input.attr('type', 'text');
        $('#editUserModal #eye-password-confirmation').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        input.attr('type', 'password');
        $('#editUserModal #eye-password-confirmation').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>