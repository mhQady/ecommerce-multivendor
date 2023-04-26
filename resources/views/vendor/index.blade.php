@extends('vendor.layout.app')
@section('content')

{{-- not approved account --}}
@if(!(auth()->guard('vendor')->user()->is_approved))
<div class="alert alert-info text-white text-center" role="alert">
    <strong>@lang('main.info')</strong> @lang('main.account_not_approved')
</div>
@else

{{-- add new store --}}
@if(is_null(auth()->guard('vendor')->user()->store))
@include('vendor.home.create-new-store')
@endif


@endif
@endsection