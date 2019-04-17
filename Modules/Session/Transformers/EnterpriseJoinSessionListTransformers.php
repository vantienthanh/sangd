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
        return  [
            'username' => $data->user->username,
            'id' => $data->id,
            'avatar' => isset($data->user->info) ? url('/').'/'.$data->user->info->avatar: null,
            'enterpriseName' => isset($data->user->info) ? $data->user->info->name: null,
            'numberUserJoin' => count($data->memberSession)
        ];
    }
}
