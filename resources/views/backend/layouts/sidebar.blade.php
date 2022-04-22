<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('backend.dashboard') }}" class="brand-link">
    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('backend.dashboard') }}"
            class="nav-link {{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('backend.articles.index') }}"
            class="nav-link {{ request()->routeIs('backend.articles.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Artikel
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('backend.sliders.index') }}"
            class="nav-link {{ request()->routeIs('backend.sliders.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Slider
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('backend.galleries.index') }}"
            class="nav-link {{ request()->routeIs('backend.galleries.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-camera"></i>
            <p>
              Galeri
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->routeIs('backend.comments.*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->routeIs('backend.comments.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Komentar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.comments.newest-comments.index') }}"
                class="nav-link {{ request()->routeIs('backend.comments.newest-comments.*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Verifikasi Komentar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('backend.comments.oldest-comments.index') }}"
                class="nav-link {{ request()->routeIs('backend.comments.oldest-comments.*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Komentar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('backend.users.index') }}"
            class="nav-link {{ request()->routeIs('backend.users.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <button type="submit" class="btn btn-danger" id="logout">Logout</button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
