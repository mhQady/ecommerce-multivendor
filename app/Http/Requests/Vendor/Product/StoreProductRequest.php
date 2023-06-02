<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Validation\Rule;
use App\Enums\Product\ProductStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in(ProductStatus::values())],
            'name.*' => 'required|string|max:255',
            'slug.*' => 'required|string|max:255',
            'type' => ['required', Rule::in(ProductStatus::values())],
            'description.*' => 'required|string|max:3000',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated($key, $default), [
            'vendor_id' => auth('vendor')->id(),
        ]);
    }
}