<?php

namespace Modules\Membersession\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateMembersessionRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required',
            'enterpriseSession_id'=> 'required'
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
