<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('frontend.index') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }}" aria-current="page"
            href="{{ route('frontend.index') }}">BERANDA</a>
          <a class="nav-link {{ request()->routeIs('frontend.articles.*') ? 'active' : '' }}" aria-current="page"
            href="{{ route('frontend.articles.index') }}">Artikel</a>
          <a class="nav-link {{ request()->routeIs('frontend.galleries.*') ? 'active' : '' }}" aria-current="page"
            href="{{ route('frontend.galleries.index') }}">Galeri</a>
          <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" aria-current="page"
            href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave">
    <path fill="#273036" fill-opacity="1"
      d="M0,96L34.3,90.7C68.6,85,137,75,206,112C274.3,149,343,235,411,224C480,213,549,107,617,106.7C685.7,107,754,213,823,240C891.4,267,960,213,1029,176C1097.1,139,1166,117,1234,122.7C1302.9,128,1371,160,1406,176L1440,192L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
    </path>
  </svg>
</header>
