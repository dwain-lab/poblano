<!-- HEADER -->

@include('layouts.__includes.__head')


@include('layouts.__includes.__topbar')

@include('layouts.__includes.__navbar')

@include('hero')

@yield('content')

@include('layouts.__includes.__footer')

@include('layouts.__includes.__scripts')
