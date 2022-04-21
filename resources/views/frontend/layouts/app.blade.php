<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/css/lightgallery.min.css">

  <style>
    .blog:hover {
      box-shadow: 0px 0px 10px grey;
      transition: 500ms;
    }

    #articles .read-more:hover {
      text-decoration: underline;
    }

    .slider-image {
      filter: brightness(50%)
    }

    .wave {
      position: absolute;
      opacity: 0.2;
    }
  </style>

  <title>Aplikasi Pengumuman Kelas TI 2C</title>
</head>

<body>
  @include('frontend.layouts.navbar')

  @yield('content')

  <footer>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave">
      <path fill="#273036" fill-opacity="1"
        d="M0,96L34.3,90.7C68.6,85,137,75,206,112C274.3,149,343,235,411,224C480,213,549,107,617,106.7C685.7,107,754,213,823,240C891.4,267,960,213,1029,176C1097.1,139,1166,117,1234,122.7C1302.9,128,1371,160,1406,176L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
      </path>
    </svg>
  </footer>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/lightgallery.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/plugins/fullscreen/lg-fullscreen.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @stack('js')

  <script>
    lightGallery(document.getElementById('galleries'), {
      selector: '.item',
      thumbnail: true,
    });

    AOS.init();
  </script>
</body>

</html>
