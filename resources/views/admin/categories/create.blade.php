@extends('admin.layout.app')
@section('title',__('main.create.category'))
@section('content')

<form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-0">@lang('main.save')</button>
        </div>
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <h5 class="font-weight-bolder">@lang('main.create.category')</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <x-image-uploader />
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>@lang('main.en.name')</label>
                                        <input value="{{ old('name.en') }}" name="name[en]" class="form-control"
                                            type="text" />
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
                                        <input value="{{ old('name.ar') }}" name="name[ar]" class="form-control"
                                            type="text" />
                                        @error('name.ar')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>@lang('main.en.slug')</label>
                                        <input value="{{ old('slug.en') }}" name="slug[en]" class="form-control"
                                            type="text" />
                                        @error('slug.en')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>@lang('main.ar.slug')</label>
                                        <input value="{{ old('slug.ar') }}" name="slug[ar]" class="form-control"
                                            type="text" />
                                        @error('slug.ar')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label> @lang('main.parent')</label>
                                    <select class="form-control" name="parent_id" id="parent-choices">
                                        <option>@lang('main.select.parent')</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
    new Choices(document.getElementById('parent-choices'), {
    removeItemButton: true,
    searchEnabled: true,
    itemSelectText: "@lang('main.press_to_select')",
    shouldSort: false,
    searchPlaceholderValue: "@lang('main.type_to_search')",
    });
</script>
@endpush