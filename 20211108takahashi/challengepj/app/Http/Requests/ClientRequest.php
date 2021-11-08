<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'confirm') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => ['required', 'regex:/^\d{3}-{1}\d{4}$/', 'size:8'],
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'lastname.required' => '苗字を入力してください。',
            'firstname.required' => '氏名を入力してください。',
            // 'gender.required' => '性別を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレス形式で入力してください。',
            'postcode.required' => '郵便番号を入力してください。',
            'postcode.regex' => '郵便番号形式(123-4567)で入力してください。',
            'postcode.size' => '郵便番号形式(123-4567)で入力してください。',
            'address.required' => '住所を入力してください。',
            'opinion.required' => 'ご意見を入力してください。',
            'opinion.max' => '120文字以内で入力してください。',
        ];
    }
}
