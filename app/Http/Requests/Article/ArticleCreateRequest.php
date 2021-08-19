<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
