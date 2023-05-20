<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

    @include('vendor.layout.head')

    <body class="bg-gray-100">
        <main class="main-content  mt-0">
            @yield('content')
        </main>

        @include('vendor.layout.script')
    </body>

</html>