<div class="card">
    <div class="card-header d-flex justify-content-between pb-0">
        <h5 class="font-weight-bolder mb-0">@lang('main.create.product')</h5>
        <div class="select-choices-min-width">
            <select class="form-control btn-outline-primary" name="status" id="choices-status">
                @foreach (\App\Enums\Product\ProductStatus::mapForSelect() as $case)
                <option @selected(old('status')==$case['value']) value="{{ $case['value'] }}">
                    @lang("main.{$case['label']}")
                </option>
                @endforeach
            </select>
            @error('status')
            <div class=" text  text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <ul class="nav nav-tabs p-0" id="namesTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0 active" id="name-en-tab" data-bs-toggle="tab"
                                data-bs-target="#name-en" type="button" role="tab" aria-controls="name-en"
                                aria-selected="true">@lang('main.en.name') <span class="text-primary">*</span></label>
                        </li>
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0" id="name-ar-tab" data-bs-toggle="tab" data-bs-target="#name-ar"
                                type="button" role="tab" aria-controls="name-ar"
                                aria-selected="false">@lang('main.ar.name')
                                <span class="text-primary">*</span></label>
                        </li>
                    </ul>
                    <div class="tab-content" id="namesTabContent">
                        <div class="tab-pane fade show active" id="name-en" role="tabpanel"
                            aria-labelledby="name-en-tab">
                            <input value="{{ old('name.en') }}" name="name[en]" class="form-control input-with-tab"
                                type="text" placeholder="@lang('main.en.name')" onkeyup="generateEnSlug(event)" />
                            @error('name.en')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="tab-pane fade" id="name-ar" role="tabpanel" aria-labelledby="name-ar-tab">
                            <input value="{{ old('name.ar') }}" name="name[ar]" class="form-control input-with-tab"
                                type="text" placeholder="@lang('main.ar.name')" onkeyup="generateArSlug(event)" />
                            @error('name.ar')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <ul class="nav nav-tabs  p-0" id="slugTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0 active" id="slug-en-tab" data-bs-toggle="tab"
                                data-bs-target="#slug-en" type="button" role="tab" aria-controls="slug-en"
                                aria-selected="true">@lang('main.en.slug') <span class="text-primary">*</span></label>
                        </li>
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0" id="slug-ar-tab" data-bs-toggle="tab" data-bs-target="#slug-ar"
                                type="button" role="tab" aria-controls="slug-ar"
                                aria-selected="false">@lang('main.ar.slug')
                                <span class="text-primary">*</span></label>
                        </li>
                    </ul>
                    <div class="tab-content" id="slugTabContent">
                        <div class="tab-pane fade show active" id="slug-en" role="tabpanel"
                            aria-labelledby="slug-en-tab">
                            <input value="{{ old('slug.en') }}" name="slug[en]" class="form-control input-with-tab"
                                type="text" placeholder="@lang('main.en.slug')" />
                            @error('slug.en')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="tab-pane fade" id="slug-ar" role="tabpanel" aria-labelledby="slug-ar-tab">
                            <input value="{{ old('slug.ar') }}" name="slug[ar]" class="form-control input-with-tab"
                                type="text" placeholder="@lang('main.ar.slug')" />
                            @error('slug.ar')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>@lang('main.type')</label>
                    <select class="form-control" name="type" id="choices-type">
                        @foreach (\App\Enums\Product\ProductType::mapForSelect() as $case)
                        <option @selected(old('type')==$case['value']) value="{{ $case['value'] }}">
                            @lang("main.{$case['label']}")
                        </option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class=" text  text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <ul class="nav nav-tabs p-0" id="descriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0 active" id="description-en-tab" data-bs-toggle="tab"
                                data-bs-target="#description-en" type="button" role="tab" aria-controls="description-en"
                                aria-selected="true">@lang('main.en.description')</label>
                        </li>
                        <li class="nav-item" role="presentation">
                            <label class="nav-link ms-0" id="description-ar-tab" data-bs-toggle="tab"
                                data-bs-target="#description-ar" type="button" role="tab" aria-controls="description-ar"
                                aria-selected="false">@lang('main.ar.description')</label>
                        </li>
                    </ul>
                    <div class="tab-content" id="descriptionTabContent">
                        <div class="tab-pane fade show active" id="description-en" role="tabpanel"
                            aria-labelledby="description-en-tab">
                            <textarea name="description[en]" placeholder="@lang('main.en.description')"
                                class="form-control input-with-tab text-editor">{{old('description.en')}}</textarea>
                            @error('description.en')
                            <div class=" text  text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tab-pane fade" id="description-ar" role="tabpanel"
                            aria-labelledby="description-ar-tab">
                            <textarea name="description[ar]" placeholder="@lang('main.ar.description')"
                                class="form-control input-with-tab text-editor">{{old('description.ar')}}</textarea>
                            @error('description.ar')
                            <div class=" text  text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    new Choices(document.getElementById('choices-status'),{
    searchEnabled: false,
    itemSelectText: "",
    shouldSort: false,
    });

    let typesSelect = document.getElementById('choices-type')

    new Choices( typesSelect,{
    searchEnabled: false,
    itemSelectText: "{{ __('main.press_to_select') }}",
    shouldSort: false,
    });

</script>
@endpush