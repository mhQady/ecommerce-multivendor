<?php

namespace App\View\Components;

use Closure;
use App\Models\Country;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;


class CountryCitySelector extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $countryInputName = 'country_id',
        public string $cityInputName = 'city_id'
    ) {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.country-city-selector');
    }

    public function selectionCategories(): Collection
    {
        return Country::whereHas('cities')->get();
    }
}