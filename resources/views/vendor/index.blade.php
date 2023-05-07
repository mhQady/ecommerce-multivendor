@if(!(auth()->guard('vendor')->user()->is_approved))
{{-- not approved account --}}
@include('vendor.home.info')
@else

@if(is_null(auth()->guard('vendor')->user()->store))
{{-- account approved but not have store --}}
@include('vendor.home.create-new-store')
@else
{{-- account approved & have store --}}
@include('vendor.home.main')
@endif

@endif