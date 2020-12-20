    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

          <h1 class="logo mr-auto"><a href="index.html">Administrator Area</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.html">Home</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  About
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('about.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('about.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('about.trashIndex') }} ">Trash Can</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('menu.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('menu.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('menu.trashIndex') }} ">Trash Can</a>
                </div>
              </li>
              <li><a href="#specials">Specials</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Event
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('event.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('event.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('event.trashIndex') }} ">Trash Can</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('gallery.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('gallery.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('gallery.trashIndex') }} ">Trash Can</a>
                </div>
              </li>
              <li><a href="#contact">Contact</a></li>
              {{-- <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li> --}}
            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </header><!-- End Header -->
