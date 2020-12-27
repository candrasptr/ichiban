<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm fixed-top mb-3">
<img src="{{asset('assets/img/logo4.png')}}" style="width: 100px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav ml-3">
      <li class="nav-item">
        <a class="nav-link text-danger" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<br><br><br><br><br>