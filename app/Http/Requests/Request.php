<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class Request extends FormRequest
{
    /**
     * NOTE:
     * FormRequestクラスのメソッドをオーバーライドします．
     * バリデーション前のページにリダイレクトせずに，バリデーション結果をJSONデータとしてレスポンスできるようにします．
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                "errors" => $validator->errors()],
                422
            )
        );
    }
}
