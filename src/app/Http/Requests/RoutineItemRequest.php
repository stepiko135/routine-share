<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'desc' => 'max:150',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'アイテム名は必ず入力してください。',
            'title.max' => '50文字以内で入力してください。',
            'desc.max' => '150文字以内で入力してください。',
        ];
    }
}
