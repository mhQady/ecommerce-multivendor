<div class="col-12 col-md-6 mt-3 text-start">
    <label>@lang('main.country')</label>
    <select class="form-control" name="{{$countryInputName}}" id="choices-country">
        @foreach($selectionCategories as $country)
        <option value="{{$country->id}}" @selected(old((string) $getErrorName($countryInputName))==$country->
            id)>{{$country->name}}
        </option>
        @endforeach
    </select>
    @error((string) $getErrorName($countryInputName))
    <small class="text text-danger">{{$message}}</small>
    @enderror
</div>
<div class="col-12 col-md-6 mt-3 text-start">
    <label>@lang('main.city')</label>
    <select class="form-control" name="{{$cityInputName}}" id="choices-city">
    </select>
    @error((string) $getErrorName($cityInputName))
    <small class="text text-danger">{{$message}}</small>
    @enderror
</div>

@push('script')
<script src="{{asset('dashboard/js/plugins/choices.min.js')}}"></script>
<script>
    const choicesOptions =  {
    searchEnabled: true,
    itemSelectText: "@lang('main.press_to_select')",
    shouldSort: false,
    searchPlaceholderValue: "@lang('main.type_to_search')",
    }

    const countries = document.getElementById('choices-country');

    new Choices(countries,choicesOptions);

    const cities = new Choices(document.getElementById('choices-city'), choicesOptions);

    window.addEventListener('load', () => {
        loadCities(countries.value);
    });

    countries.addEventListener('change', (e,choice) => {
        loadCities(e.target.value)
    })

    function loadCities(countryId) {
        $.ajax({
            type: "POST",
            url: "{{route('ajax.relatedCities')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "country_id": countryId
            },
            success: async function (response) {

                let cityOptions = await changeCitiesResponse(response);

                cities.clearChoices();
                cities.setChoices(cityOptions);
            }
        });
    }

    function changeCitiesResponse(response) {
        @if(old((string) $getErrorName($cityInputName)))
        let oldCitySelectorVal = {{old((string) $getErrorName($cityInputName))}}
        @else
        let oldCitySelectorVal = response[0]['id']
        @endif

        return  response.map((city) => {
            return  { value: city.id, 'label': city.name, selected: oldCitySelectorVal == city.id };
        })
    }
</script>
@endpush