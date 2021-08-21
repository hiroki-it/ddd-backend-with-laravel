<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use App\Constant\CriteriaConstant;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

final class ArticleGetRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'order' => [
                Rule::in(CriteriaConstant::ORDER_LIST)
            ],
            'limit' => [
                Rule::in(CriteriaConstant::LIMIT_LIST)
            ],
        ];
    }
}
