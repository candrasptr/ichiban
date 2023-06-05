<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm fixed-top mb-3">
  <a href="{{ route('home') }}">
    <img src="{{asset('assets/img/logo5.png')}}" style="width: 200px;">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      
      <!-- search button -->
  
      <form action="/search" method="GET">
        <div class="input-group">
          <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
          <div class="input-group-append">
            <button id="btncaribuku" class="btn btn-outline-dark bg-dark" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
          </div>
        </div>
        </form>
  
      <ul class="navbar-nav ml-3">
        <li class="nav-item">
          <div class="d-flex items-center align-items-center">
            <a class="nav-link text-dark" style="margin: 1rem" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</a>
            <a href="/cart" type="submit" class="btn btn-dark text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  <br><br><br><br><br>