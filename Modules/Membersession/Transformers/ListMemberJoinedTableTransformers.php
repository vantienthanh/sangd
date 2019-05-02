<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 02/05/2019
 * Time: 17:49
 */

namespace Modules\Membersession\Transformers;


use League\Fractal\TransformerAbstract;

class ListMemberJoinedTableTransformers extends TransformerAbstract
{
    public function transform ($data) {
        return [
            'user_id' => $data->user_id,
            'user_name' => $data->user->username,
            'full_name' => $data->user->info? $data->user->info->name : "Người này chưa cập nhật thông tin",
        ];
    }
}