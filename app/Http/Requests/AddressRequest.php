<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'street'      => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'province'    => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country'     => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'street.required'      => 'La calle es obligatoria.',
            'street.max'           => 'La calle no debe exceder los 255 caracteres.',
            'city.required'        => 'La ciudad es obligatoria.',
            'city.max'             => 'La ciudad no debe exceder los 255 caracteres.',
            'province.required'    => 'La provincia es obligatoria.',
            'province.max'         => 'La provincia no debe exceder los 255 caracteres.',
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.max'      => 'El código postal no debe exceder los 20 caracteres.',
            'country.required'     => 'El país es obligatorio.',
            'country.max'          => 'El país no debe exceder los 255 caracteres.',
        ];
    }
}
