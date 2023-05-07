<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('meta')

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('dashboard/img/favicon.png')}}">
    <title>
        @yield('title', __('main.ecommerce'))
    </title>

    <link rel="stylesheet" href="{{ asset('dashboard/fonts/tajawal/tajawal.css') }}" />

    <link href="{{asset('dashboard/css/nucleo-icons.cs')}}s" rel="stylesheet" />
    <link href="{{asset('dashboard/css/nucleo-svg.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{asset('dashboard/css/nucleo-svg.css')}}" rel="stylesheet" />

    <link id="pagestyle" href="{{asset('dashboard/css/soft-ui-dashboard.css?v=1.1.1')}}" rel="stylesheet" />
    @stack('style')
</head>