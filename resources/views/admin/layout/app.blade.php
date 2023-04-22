<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ session('dir') }}">

    @include('admin.layout.head')

    <body class="g-sidenav-show  bg-gray-100 {{ session('dir') }}">

        @include('admin.layout.aside')

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('admin.layout.navbar')
            <div class="container-fluid py-4">
                @yield('content')

                @include('admin.layout.footer')
            </div>
        </main>

        @include('admin.layout.fixed-plugin')

        @include('components.delete-modal')

        @include('admin.layout.script')

    </body>

</html>