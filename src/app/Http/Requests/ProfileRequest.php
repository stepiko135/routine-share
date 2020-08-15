<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'image' => 'max:100|dimensions:max_width=1000,max_height=1000|image',
            'profile' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'ファイル名が長すぎます。100文字以内にしてください。',
            'image.dimensions' =>'ファイルが大きすぎます。最大1000×1000ピクセルです。',
            'image.image' => '画像ファイルを選択してください。',
            'profile.max' => '200文字以内で入力してください。',
        ];
    }
}
