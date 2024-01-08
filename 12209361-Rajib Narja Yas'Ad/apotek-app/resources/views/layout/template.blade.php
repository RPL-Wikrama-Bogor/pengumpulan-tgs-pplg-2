
  <body>
      
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">Apotek</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        {{-- auth::check -> cek apakah sudah ada data login atau belum,
                        kalo ada munculin menu navnya --}}
                        @if (Auth::check())
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                </li>

                @if (Auth::user()->role == "admin")
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Obat
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('medicine.data') }}">Data Obat</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicine.create') }}">Tambah Data</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicine.data.stock') }}">Stock</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.order.data')}}">Data Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.data')}}">Kelola Akun</a>
                </li>
            </li>
            <li class="nav-item">
                @endif
                @if (Auth::user()->role == "cashier")
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('order.index')}}">Pembelian</a>
                </li>
                @endif
                <a class="nav-link" href="{{ route('auth-logout') }}">Logout</a>
            </li>
            @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    {{-- menyimpan html yang sifatnya dinamis/berubah --}}
    @yield('content')
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('script')
  </body>
</html>

