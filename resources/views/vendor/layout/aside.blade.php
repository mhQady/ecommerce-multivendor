<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 bg-white {{ app()->getLocale() == 'ar' ? 'fixed-end me-3' : 'fixed-start ms-3' }}"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route('vendor.home')}}">
            <img src="{{asset('dashboard/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">@lang('main.vendor')</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#productsNav" @class(['nav-link', 'active'=>
                    request()->is('*vendor/products*')])
                    aria-controls="productsNav" role="button"
                    aria-expanded="{{request()->is('*vendor/products*') ? 'true' : 'false'}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center d-flex align-items-center justify-content-center  me-2">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('main.products')</span>
                </a>
                <div @class(['collapse', 'show'=> request()->is('*vendor/products*')])
                    id="productsNav">
                    <ul class="nav ms-4 ps-3">
                        <li @class(['nav-item', 'active'=> request()->routeIs('vendor.products.index')])>
                            <a @class(['nav-link', 'active'=> request()->routeIs('vendor.products.index')])
                                href="{{route('vendor.products.index')}}">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal"> @lang('main.products') </span>
                            </a>
                        </li>
                        <li @class(['nav-item', 'active'=> request()->routeIs('vendor.products.create')])>
                            <a @class(['nav-link', 'active'=> request()->routeIs('vendor.products.create')])
                                href="{{route('vendor.products.create')}}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> @lang('main.create.product') </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>