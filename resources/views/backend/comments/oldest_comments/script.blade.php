<script>
  $(function () {
    $('#unverify-button').click(function (e) {
      e.preventDefault();
      Swal.fire({
        title: 'Unverifikasi?',
        text: 'Status komentar tersebut akan dirubah menjadi belum diverifikasi',
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
