<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 20/03/2019
 * Time: 10:29
 */

namespace Modules\Membercv\Transformers;


use League\Fractal\TransformerAbstract;

class MemberCVTransformers extends TransformerAbstract
{
    public function transform ($data) {
        return[
            'id' => $data->id,
            'title' => $data->title,
            'location' => $data->location,
            'description' => $data->description,
            'created_at' => $data->created_at,
            'job' => $data->job,
            'workingTime' => $data->workingTime,
            'avatar' => isset($data->user) ? url('/').'/'.$data->user->info->avatar: null
        ];
    }
}
