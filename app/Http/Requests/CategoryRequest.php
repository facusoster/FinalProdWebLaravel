<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->route('category'),
            'description' => 'nullable|string|max:500',
        ];
    }
}
