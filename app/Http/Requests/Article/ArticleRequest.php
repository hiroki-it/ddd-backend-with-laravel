<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

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
            'limit' => [
                'required',
                Rule::in(CriteriaConstant::LIMIT_LIST)
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'type' => [
                'required',
                'string'
            ],
            'content' => [
                'required',
                'string',
                'max:10000'
            ],
        ];
    }
}
