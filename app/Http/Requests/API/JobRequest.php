<?php

namespace App\Http\Requests\API;

use App\Http\BookingApp\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'city' => ['required', 'string'],
            'salary' => ['required', 'numeric'],
            'expire_on' => ['required', 'date'],
            'category' => ['required'],
        ];
    }
}
