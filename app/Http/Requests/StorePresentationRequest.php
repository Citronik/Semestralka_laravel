<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresentationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'presentation_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'presentation_file' => 'file|mimes:ppt,pptx|max:2048',
            'tags' => 'array',
            'tags.*' => 'required|integer|exists:tags,id'
        ];
    }
}
