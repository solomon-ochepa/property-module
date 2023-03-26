<?php

namespace Modules\Property\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('property.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'property.title'     => ['required', 'string', 'max:200'],
            'address.country'   => ['required', 'string', 'max:120'],
            'address.state'   => ['required', 'string', 'max:120'],
            'address.city'   => ['required', 'string', 'max:120'],
            'address.area'   => ['nullable', 'string', 'max:120'],
            'address.address'   => ['nullable', 'string', 'max:120'],
            'property.price'    => ['required', 'numeric', 'min:1'],
            'images'            => ['required', 'image', 'mimes:png,jpg,svg,webp,tiff,tif'],
        ];
    }
}
