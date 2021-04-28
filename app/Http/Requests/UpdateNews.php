<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string|min:3|max:100',
            'newstext' => 'required|min:3',
            'slug' => 'sometimes',
            'status' => 'sometimes',
            'author' => 'sometimes|string',
            'img' => 'sometimes|image:png'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'newstext' => 'Новость',
            'author' => 'Автор'
        ];
    }
}
