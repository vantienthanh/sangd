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
            'enterprise_id' => $data->enterpriseSession->user->id,
            'enterprise_name' => $data->enterpriseSession->user->info? $data->enterpriseSession->user->info->name : null,
            'enterprise_avatar' =>   $data->enterpriseSession->user->info?url('/').'/'. $data->enterpriseSession->user->info->avatar : null,
            'timeInterview' => $data->timeInterview,
            'created_at' => $data->created_at
        ];
    }
}
