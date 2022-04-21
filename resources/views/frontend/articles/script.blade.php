<script>
  document.addEventListener('DOMContentLoaded', function () {
    let commentForm = document.getElementById('comment-form');

    commentForm.addEventListener('submit', function (e) {
      e.preventDefault();
      let url = "{{ route('frontend.comments.store') }}";
      let token = document.getElementsByName('_token');
      let errorTag = document.getElementById('error');

      let articleId = document.getElementById('article_id');
      let name = document.getElementById('name');
      let email = document.getElementById('email');
      let body = document.getElementById('body');

      const data = {
        name: name.value,
        email: email.value,
        body: body.value,
        articleId: articleId.value
      };

      console.log(articleId.value);

      fetch(url, {
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': token[0].value
        },
        method: 'POST',
        body: JSON.stringify(data)
      }).then(function (res) {
        return res.json();
      }).then(function (res) {
        console.log(res);
        if (res.code == 201) {
          name.value = '';
          email.value = '';
          body.value = '';

          Swal.fire(
            'Berhasil!',
            'Komentar anda telah ditambahkan, akan menunggu persetujuan terlebih dahulu!',
            'success'
          )
        } else if (res.code == 400) {
          for (key in res.message) {
            errorTag.innerHTML += `
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Gagal!</strong> ${res.message[key][0]}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                `;
          }
        }
      });
    });
  });
</script>
