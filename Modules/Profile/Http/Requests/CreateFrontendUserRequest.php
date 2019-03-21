<?php

namespace Modules\Profile\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFrontendUserRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string|max:255|unique:profile__frontendUsers',
            'role' => 'required',
            'password'=> 'required'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
