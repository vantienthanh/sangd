<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 30/03/2019
 * Time: 20:18
 */

namespace Modules\Session\Transformers;


use League\Fractal\TransformerAbstract;

class EnterpriseJoinSessionListTransformers extends TransformerAbstract
{
    public function transform ($data) {
        dd($data->user);
        return  [
            'username' => $data->user->username
        ];
    }

}
