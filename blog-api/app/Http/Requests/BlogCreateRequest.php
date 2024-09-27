<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            // 'user_id' => 'required'
        ];
    }
}
