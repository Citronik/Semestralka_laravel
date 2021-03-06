<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePresentationRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'presentation_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'presentation_file' => 'file|mimes:ppt,pptx,pdf|max:32768',
            'tags' => 'array',
            'tags.*' => 'string|exists:tags,id'
        ];
    }
}
