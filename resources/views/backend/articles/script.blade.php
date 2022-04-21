<script>
  $(function () {
    $('#title').keyup(function () {
      let title = $('#title').val();

      let slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

      $('#slug').val(slug);
    });

    $('#body').summernote({
      lang: 'id-ID',
      height: 150
    });
  });
</script>
