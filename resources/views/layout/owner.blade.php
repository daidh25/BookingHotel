<!DOCTYPE html>
<html lang="en">
@include('head')
<title>@yield('title')</title>

<body>
    <main id="app">
        @include('sweetalert::alert')
        @yield('content')
    </main>
</body>

</html>
