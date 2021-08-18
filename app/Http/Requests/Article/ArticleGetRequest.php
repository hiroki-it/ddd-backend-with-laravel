<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use App\Constant\CriteriaConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class ArticleGetRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'order' => [
                'required',
                Rule::in(CriteriaConstant::ORDER_LIST)
            ],
            'limit' => [
                'required',
                Rule::in(CriteriaConstant::LIMIT_LIST)
            ],
        ];
    }
}
