<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rule(): array
    {
        return [
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
