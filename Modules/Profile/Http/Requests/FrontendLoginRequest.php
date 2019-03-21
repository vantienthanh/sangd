<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 10:41
 */

namespace Modules\Profile\Http\Requests;


use Modules\Core\Internationalisation\BaseFormRequest;

class FrontendLoginRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'username' => 'required',
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