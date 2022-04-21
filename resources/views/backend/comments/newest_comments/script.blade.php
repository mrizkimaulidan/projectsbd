<script>
  $(function () {
    $('#verify-button').click(function (e) {
      e.preventDefault();
      Swal.fire({
        title: 'Verifikasi?',
        text: 'Status komentar tersebut akan dirubah menjadi sudah diverifikasi',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $(this).parent().submit();
        }
      });
    })
  });
</script>
