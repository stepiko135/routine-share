<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ユーザーによる投稿制限を行う場合はここに入力する。
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
            'time' => 'date_format:H:i',
            'name' => 'required|max:100',
            'desc' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ルーティン名は必ず入力してください。',
            'name.max' => '100文字以内で入力してください。',
            'desc.required' => '説明は必ず入力してください。',
            'desc.max' => '200文字以内で入力してください。',
        ];
    }
}
