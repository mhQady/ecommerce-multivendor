@extends('vendor.layout.app-headless')
@section('content')
<div class="page-header bg-gradient-primary  position-relative m-3 border-radius-xl">
    <img src="{{asset('dashboard/img/shapes/waves-white.svg')}}" alt="pattern-lines"
        class="position-absolute opacity-6 start-0 top-0 w-100">
    <div class="container pb-lg-9 pb-10 pt-7 postion-relative z-index-2">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-7 mx-auto text-center">
                <div class="alert alert-info text-white text-center" role="alert">
                    <strong>@lang('main.info')</strong> @lang('main.account_not_approved')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection