<?php

namespace Modules\JobNews\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateJobNewsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'salary' => 'required',
            'benefit' => 'required',
            'user_id' =>'required',
            'description' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'amount' => 'required',
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
