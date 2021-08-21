<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\Request;

final class ArticleUpdateRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'type' => [
                'required',
                'integer'
            ],
            'content' => [
                'required',
                'string',
                'max:10000'
            ],
        ];
    }
}
