@extends('vendor.layout.app')
@section('title',__('main.create.brand'))
@section('content')
<form method="post" action="{{ route('vendor.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-0">@lang('main.save')</button>
        </div>
        <div class="col-8">
            @include('vendor.products.parts.create.main-info')
        </div>
    </div>
</form>
@endsection