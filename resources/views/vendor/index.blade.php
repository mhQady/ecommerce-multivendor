@extends('vendor.layout.app')
@section('content')
{{-- @dd(auth()->guard('vendor')->user()->is_approved) --}}
@if(!auth()->guard('vendor')->user()->is_approved)
<div class="alert alert-info text-white text-center" role="alert">
    <strong>@lang('main.info')</strong> @lang('main.account_not_approved')
</div>
@endif
@endsection