<label>@lang('main.select.brand')</label> @error('brand_id')
<span class="text text-danger mx-2">{{ $message }}</span>
@enderror
<select class="form-control" name="brand_id" id="choices-brand">
    <option value="">@lang('main.select.brand')</option>
    @forelse ($brands as $brand)
    <option @selected(old('brand_id')==$brand->id) value="{{ $brand->id }}">
        {{ $brand->name }}
    </option>
    @empty
    <option value="">@lang('main.empty.brand')</option>
    @endforelse
</select>

@push('script')
<script>
    new Choices(document.getElementById('choices-brand'), {
        removeItemButton: true,
        itemSelectText: "{{ __('main.press_to_select') }}",
        searchPlaceholderValue:"@lang('main.type_to_search')"
    });
</script>
@endpush