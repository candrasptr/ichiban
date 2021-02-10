<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Ichibanresto</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Ichi</a>
    </div>
      <ul class="sidebar-menu">
        {{-- dashboard --}}
        <li class="menu-header">Dashboard</li>
        <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        {{-- Transaksi --}}
        <li class="@yield('transaksi')"><a class="nav-link" href="/transaksi"><i class="ion ion-ios-pricetag"></i> <span>Transaksi</span></a></li>
        {{-- Orderan --}}
        <li class="@yield('orderan')"><a class="nav-link" href="/orderan"><i class="ion ion-ios-pricetags"></i> <span>Orderan</span></a></li>
        {{-- Masakan --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown "><i class="ion ion-android-apps"></i> <span>Menu</span></a>
          <ul class="dropdown-menu">
            <li class="@yield('masakan')"><a class="nav-link" href="/masakan"><i class=""></i> <span>Makanan</span></a></li>
            <li class="@yield('masakan')"><a class="nav-link" href="/adminminuman"><i class=""></i> <span>Minuman</span></a></li>
            <li class="@yield('masakan')"><a class="nav-link" href="/admindessert"><i class=""></i> <span>Dessert</span></a></li>
          </ul>
        </li>
        {{-- User --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown "><i class="fas fa-users"></i> <span>User</span></a>
          <ul class="dropdown-menu">
            <li class="@yield('user')"><a class="nav-link" href="/admin"><i class=""></i> <span>Admin</span></a></li>
            <li class="@yield('user')"><a class="nav-link" href="/waiterindex"><i class=""></i> <span>Waiter</span></a></li>
            <li class="@yield('user')"><a class="nav-link" href="/kasirindex"><i class=""></i> <span>Kasir</span></a></li>
            <li class="@yield('user')"><a class="nav-link" href="/pelanggan"><i class=""></i> <span>Pelanggan</span></a></li>
          </ul>
        </li>
        {{-- Feedback --}}
        <li class="@yield('feedback')"><a class="nav-link" href="/feedback-list"><i class="ion ion-ios-albums"></i> <span>Feedback</span></a></li>
        {{-- Laporan --}}
        <li class="@yield('laporan')"><a class="nav-link" href="/laporan"><i class="ion ion-ios-copy"></i> <span>Laporan</span></a></li>
      </ul>
  </aside>
</div>