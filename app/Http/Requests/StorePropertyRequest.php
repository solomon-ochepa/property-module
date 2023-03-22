<?php

namespace Modules\Property\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'property.name'     => ['required', 'string', 'max:200'],
            'property.address'  => ['required', 'string', 'max:200'],
            'property.price'    => ['required', 'numeric', 'min:1'],
            'images'            => ['required', 'image', 'mimes:png,jpg,svg,webp,tiff,tif'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('property.create');
    }
}
