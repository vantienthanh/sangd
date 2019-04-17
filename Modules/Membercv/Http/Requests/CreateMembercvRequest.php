<?php

namespace Modules\Membercv\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateMembercvRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'location' => 'required',
            'job' => 'required',
            'workingTime' => 'required',
            'description' => 'required',
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
