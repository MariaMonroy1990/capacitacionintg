<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['name'=>'required|min:7',
               'description'=>'required|min:7|max:200',
               'category_id'=>'required|exists:categories,id',
               //si tengo la tabla en otra base de datos debo indicar la base de datos plsg.categories
               'resources'=>'required|array',
               'resources.*'=>'image|mimes:jpeg,png'

        ];
    }
}
