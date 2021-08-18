<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ユーザリクエストクラス
 */
final class UserRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストの権限を持っているかを判定します．
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストされたデータを検証します．
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 名前
            'name' => [
                'required',
                'string'
            ],

            // メールアドレス
            'email_address' => [
                'required',
                'string'
            ],

            // パスワード
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
