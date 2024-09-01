<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskCategoryRequest extends FormRequest
{
    const MIN_NAME_LENGTH = 1;

    const MAX_NAME_LENGTH = 255;

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
            'name' => [
                'required',
                'string',
                'min:'.self::MIN_NAME_LENGTH,
                'max:'.self::MAX_NAME_LENGTH,
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must not be less than '.self::MIN_NAME_LENGTH.' character',
            'name.max' => 'Name must not be greater than '.self::MAX_NAME_LENGTH.' characters',
        ];
    }
}
