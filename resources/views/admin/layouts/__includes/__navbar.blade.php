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
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="nav-item dropdown @yield('active_about')">
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
              <li class="nav-item dropdown @yield('active_menu')">
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
              <li class="nav-item dropdown @yield('active_event')">
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
              <li class="nav-item dropdown @yield('active_gallery')">
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
              <li class="nav-item dropdown @yield('active_special')">
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
              <li class="nav-item dropdown @yield('active_why')">
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

                    <a href="#myModal" class="dropdown-item" data-toggle="modal">Logout</a>
                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href=" {{ route('admin.user-activity') }} ">User Activity</a>
                </div>
              </li>
            @endif
              {{-- <li><a href="#contact">Contact</a></li> --}}
              {{-- <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li> --}}
            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </header><!-- End Header -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="red" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to log out?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</button>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
