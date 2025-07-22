<?php

namespace App\Modules\Comment\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
{

    /**
     * Determine if the ProductAttachment is authorized to make this request.
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
            'author_name' => ['required', 'string'],
            'article_id' => ['required', 'integer'],
            'content' => ['required', 'string'],

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'key.required' => 'Key Field is Required'
        ];
    }
}
