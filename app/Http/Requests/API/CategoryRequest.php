<?php

namespace App\Http\Requests\API;

use App\Http\BookingApp\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','unique:categories,name,except,id'],
            'isMain' => ['required', 'boolean'],
            'father' => ['required', 'exists:categories,id'],

        ];
    }
}
