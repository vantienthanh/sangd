<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 26/03/2019
 * Time: 11:40
 */

namespace Modules\Membersession\Transformers;


use League\Fractal\TransformerAbstract;

class MemberSessionTransformers extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'id' => $data->id,
            'user_id' => $data->user->id,
            'username' => $data->user->info->name,
            'timeInterview' => $data->timeInterview
        ];
    }
}