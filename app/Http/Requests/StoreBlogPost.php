<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBlogPost extends FormRequest
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
        $id = is_null($this->input('id')) ? 0 : $this->input('id');

        return [
            'title' => 'required|unique:posts,title,'.$id.',id|max:255',
            'content' => 'required',
        ];
    }
}
