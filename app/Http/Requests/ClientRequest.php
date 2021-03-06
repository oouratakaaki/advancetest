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
        if ($this->path() === 'index') {
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
            //お名前
            'last_name' => 'required|alpha',
            'first_name' => 'required|alpha',
            //性別
            'gender' => 'required',
            //メールアドレス
            'email' => 'required|email',
            //郵便番号
            'postcode' => 'required|min:8|max:8|regex:/^[!-~ ¥]+$/u',
            //住所
            'address' => 'required',
            //建物名
            'building_name' => 'nullabled',
            //ご意見
            'opinion' => 'required|max:120'
        ];
    }
    public function messages()
    {
        return [
            'last_name.required' => '性を入力してください',
            'last_name.alpha' => '性を入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.alpha' => '名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '郵便番号を入力してください',
            'postcode.min' => '郵便番号を入力してください',
            'postcode.max' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => '120文字以内で入力してください'
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
