<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    const MIN_TITLE_LENGTH = 1;

    const MIN_DESCRIPTION_LENGTH = 1;

    const MAX_TITLE_LENGTH = 255;

    const MAX_DESCRIPTION_LENGTH = 1000;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:'.self::MIN_TITLE_LENGTH,
                'max:'.self::MAX_TITLE_LENGTH,
            ],
            'description' => [
                'required',
                'string',
                'min:'.self::MIN_DESCRIPTION_LENGTH,
                'max:'.self::MAX_DESCRIPTION_LENGTH,
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:task_categories,id',
            ],
            'assigned_user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'due_date' => [
                'required',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.min' => 'Title must not be less than '.self::MIN_TITLE_LENGTH.' character',
            'title.max' => 'Title must not be greater than '.self::MAX_TITLE_LENGTH.'characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must not be less than '.self::MIN_DESCRIPTION_LENGTH.' character',
            'description.max' => 'Description must not be greater than '.self::MAX_DESCRIPTION_LENGTH.' characters',
            'category_id.required' => 'Category is required',
            'category_id.integer' => 'Category must be an integer',
            'category_id.exists' => 'Category does not exist',
            'assigned_user_id.required' => 'Assigned user is required',
            'assigned_user_id.integer' => 'Assigned user must be an integer',
            'assigned_user_id.exists' => 'Assigned user does not exist',
            'due_date.required' => 'Due date is required',
            'due_date.date' => 'Due date must be a date',
        ];
    }
}
