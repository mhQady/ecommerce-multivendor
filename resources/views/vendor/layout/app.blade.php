<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ session('dir') }}">

@include('vendor.layout.head')

<body class="g-sidenav-show  bg-gray-100 {{ session('dir') }}">

    @include('vendor.layout.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('vendor.layout.navbar')
        <div class="container-fluid py-4 min-vh-80">
            @yield('content')

        </div>
        @include('vendor.layout.footer')
    </main>

    @include('vendor.layout.fixed-plugin')

    @include('components.delete-modal')

    @include('vendor.layout.script')
</body>

</html>
