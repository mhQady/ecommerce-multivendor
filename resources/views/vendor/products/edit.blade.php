@extends('vendor.layout.app')
@section('title',$brand->name)
@section('content')

<form method="post" action="{{ route('vendor.brands.update',$brand->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-0">@lang('main.save')</button>
        </div>
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <h5 class="font-weight-bolder">{{ $brand->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <x-image-uploader :files="$brand->getMedia('main')" :model="$brand" />
                            @error('image')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label>@lang('main.en.name')</label>
                                <input value="{{ old('name.en',$brand->getTranslation('name','en')) }}" name="name[en]"
                                    class="form-control" type="text" />
                                @error('name.en')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('main.ar.name')</label>
                                <input value="{{ old('name.ar',$brand->getTranslation('name','ar')) }}" name="name[ar]"
                                    class="form-control" type="text" />
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
    </div>
</form>
@endsection
