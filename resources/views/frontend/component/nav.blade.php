<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Accounting</a>
        <form action="#" class="searchform order-sm-start order-lg-last">
      <div class="form-group d-flex">
        <input type="text" class="form-control pl-3" placeholder="Search">
        <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
      </div>
    </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ url('/services') }}" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="{{ url('/package') }}" class="nav-link">Package</a></li>
          <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="{{ url('/error') }}" class="nav-link">Error</a></li>
          <li class="nav-item" style="color: green"><a href="{{ url('/admin') }}" class="nav-link">ACCOUNTING</a></li>

        </ul>
      </div>
    </div>
  </nav>
