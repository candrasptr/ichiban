<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Ichibanresto</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ichi</a>
          </div>
          <ul class="sidebar-menu">

              <li class="menu-header">Dashboard</li>

              <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

              <li class="menu-header">Menu</li>

              <li class="@yield('transaksi')"><a class="nav-link" href="/transaksi"><i class="ion ion-ios-pricetag"></i> <span>Transaksi</span></a></li>

              <li class="@yield('orderan')"><a class="nav-link" href="/orderan"><i class="ion ion-ios-pricetags"></i> <span>Orderan</span></a></li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown "><i class="ion ion-ios-box"></i> <span>Menu</span></a>
                <ul class="dropdown-menu">
                  <li class="@yield('masakan')"><a class="nav-link" href="/masakan"><i class=""></i> <span>Makanan</span></a></li>
                  <li class="@yield('masakan')"><a class="nav-link" href="/adminminuman"><i class=""></i> <span>Minuman</span></a></li>
                  <li class="@yield('masakan')"><a class="nav-link" href="/admindessert"><i class=""></i> <span>Dessert</span></a></li>
                </ul>
              </li>

              <li class="@yield('kategori')"><a class="nav-link" href="/kategori"><i class="fas fa-th"></i> <span>Kategori</span></a></li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown "><i class="fas fa-users"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                  <li class="@yield('user')"><a class="nav-link" href="/admin"><i class=""></i> <span>Admin</span></a></li>
                  <li class="@yield('user')"><a class="nav-link" href="/waiterindex"><i class=""></i> <span>Waiter</span></a></li>
                  <li class="@yield('user')"><a class="nav-link" href="/kasirindex"><i class=""></i> <span>Kasir</span></a></li>
                  <li class="@yield('user')"><a class="nav-link" href="/pelanggan"><i class=""></i> <span>Pelanggan</span></a></li>
                </ul>
              </li>

              <li class="@yield('laporan')"><a class="nav-link" href="/laporan"><i class="ion ion-ios-copy"></i> <span>Laporan</span></a></li>
              <!-- <li class="menu-header">Stisla</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="components-article.html">Article</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                  <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                  <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                  <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                  <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                  <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                  <li><a class="nav-link" href="components-table.html">Table</a></li>
                  <li><a class="nav-link" href="components-user.html">User</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                  <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                  <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                  <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                  <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                  <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                  <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                  <li><a href="gmaps-marker.html">Marker</a></li>
                  <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                  <li><a href="gmaps-route.html">Route</a></li>
                  <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                  <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                  <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                  <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                  <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                  <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                  <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                  <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                  <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                  <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                  <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                  <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
              </li>
              <li class="menu-header">Pages</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                  <li><a href="auth-login.html">Login</a></li>
                  <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                  <li><a href="auth-register.html">Register</a></li>
                  <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="errors-503.html">503</a></li>
                  <li><a class="nav-link" href="errors-403.html">403</a></li>
                  <li><a class="nav-link" href="errors-404.html">404</a></li>
                  <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                  <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                  <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                  <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                  <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                  <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                  <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
              </li> -->
            <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
        </aside>
      </div>