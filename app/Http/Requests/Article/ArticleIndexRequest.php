<?php

declare(strict_types=1);

namespace App\Http\Requests\Article;

use App\Constant\CriteriaConstant;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

final class ArticleIndexRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'target' =>[
                "required",
            ],
            'limit'  => [
                "required",
                Rule::in(CriteriaConstant::LIMIT),
            ],
            'order'  => [
                "required",
                Rule::in(CriteriaConstant::ORDER_LIST)
            ],
        ];
    }
}
