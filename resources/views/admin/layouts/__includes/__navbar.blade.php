    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container" style="margin: inherit;clear: both;position: absolute;padding-top: 5px; display:flex">
            @if(Breadcrumbs::has())
            @foreach (Breadcrumbs::current() as $crumbs)
                @if ($crumbs->url() && !$loop->last)
                    <li class="breadcrumb-item">
                        <a href="{{ $crumbs->url() }}">
                            {{ $crumbs->title() }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active">
                        {{ $crumbs->title() }}
                    </li>
                @endif
            @endforeach
        @endif
                </div>
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
                  <a class="dropdown-item" href=" {{ route('menu.index') }} ">Menu Home</a>
                  <a class="dropdown-item" href=" {{ route('menu.create') }} ">Add New Menu</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('menu.trashIndex') }} ">Menu Trash Can</a>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('menu_category.index') }} ">Category Home</a>
                  <a class="dropdown-item" href=" {{ route('menu_category.create') }} ">Add New Category</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('menu_category.trashIndex') }} ">Category Trash Can</a>
                </div>
              </li>
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Special
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('special.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('special.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('special.trashIndex') }} ">Trash Can</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Why
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=" {{ route('why.index') }} ">Home</a>
                  <a class="dropdown-item" href=" {{ route('why.create') }} ">Add New</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=" {{ route('why.trashIndex') }} ">Trash Can</a>
                </div>
              </li>

            @if(Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Hello {{ Auth::User()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              </li>
            @endif
              {{-- <li><a href="#contact">Contact</a></li> --}}
              {{-- <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li> --}}
            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </header><!-- End Header -->
