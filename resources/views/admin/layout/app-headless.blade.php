<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

    @include('admin.layout.head')

    <body class="bg-gray-100">
        <main class="main-content  mt-0">
            @yield('content')
        </main>

        @include('admin.layout.script')
    </body>

</html>