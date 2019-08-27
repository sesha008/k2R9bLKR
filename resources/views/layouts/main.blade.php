<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
	<div id="app">
    @include('flash::message')
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
  </div>
    @include('layouts.javascript')
</body>
</html>