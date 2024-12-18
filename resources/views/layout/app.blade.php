<!DOCTYPE html>
<html lang="en">
@include('head')
<title>@yield('title')</title>

<body>
    <main id="app">
        @include('sweetalert::alert')
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
    </main>
</body>

</html>
