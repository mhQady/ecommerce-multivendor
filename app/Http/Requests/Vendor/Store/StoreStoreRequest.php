<?php

namespace App\Http\Requests\Vendor\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'business_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',

            'address.address' => 'required|string|max:255',
            'address.country_id' => 'required|exists:countries,id',
            'address.city_id' => 'required|exists:cities,id',
            'address.region' => 'nullable|string|max:255',
            'address.street' => 'nullable|string|max:255',
            'address.building' => 'nullable|string|max:255',
            'address.flat' => 'nullable|string|max:255',
            'address.note' => 'nullable|string|max:255',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated(), [
            'vendor_id' => auth()->guard('vendor')->id()
        ]);
    }
}