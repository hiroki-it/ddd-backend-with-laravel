<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Constant\CriteriaConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 記事リクエストクラス
 */
final class ArticleRequest extends FormRequest
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
            // 件数
            'limit' => [
                'required',
                Rule::in(CriteriaConstant::LIMIT_LIST)
            ],

            // 順序名
            'order'=>[
                'required',
                Rule::in(CriteriaConstant::ORDER_LIST)
            ],

            // タイトル
            'title' => [
                'required',
                'string',
                'max:255'
            ],

            // 本文
            'body' => [
                'required',
                'string',
                'max:10000'
            ],

            // 区分
            'type' => [
                'required',
                'string'
            ]
        ];
    }
}
