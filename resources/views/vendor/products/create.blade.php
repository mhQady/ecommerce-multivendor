@extends('vendor.layout.app')
@section('title',__('main.create.brand'))
@section('content')

<form method="post" action="{{ route('vendor.brands.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-0">@lang('main.save')</button>
        </div>
        <div class="col-8">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <h5 class="font-weight-bolder">@lang('main.create.brand')</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        {{-- <div class="col-4">
                            <x-image-uploader />
                        </div> --}}
                        <div class="col-6">
                            <div class="form-group">
                                <label>@lang('main.en.name')</label>
                                <input value="{{ old('name.en') }}" name="name[en]" class="form-control" type="text"
                                    onkeyup="generateEnSlug(event)" />
                                @error('name.en')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>@lang('main.ar.name')</label>
                                <input value="{{ old('name.ar') }}" name="name[ar]" class="form-control" type="text"
                                    onkeyup="generateArSlug(event)" />
                                @error('name.ar')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <h5 class="font-weight-bolder">@lang('main.create.brand')</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="form-group">
                                <label>@lang('main.en.slug')</label>
                                <input value="{{ old('slug.en') }}" name="slug[en]" class="form-control" type="text" />
                                @error('slug.en')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>@lang('main.ar.slug')</label>
                                <input value="{{ old('slug.ar') }}" name="slug[ar]" class="form-control" type="text" />
                                @error('slug.ar')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('script')
<script>
    function generateEnSlug(e){
        document.getElementsByName('slug[en]')[0].value = convertToSlug(e.target.value)
    }
    function generateArSlug(e){
        document.getElementsByName('slug[ar]')[0].value = convertToSlug(e.target.value)
    }

    function convertToSlug(text) {
        return text.toString().toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^\w\u0621-\u064A0-9-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+/, '').replace(/-+$/, '');
    }
</script>
@endpush
