<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 14:14
 */

namespace Modules\JobNews\Transformers;

use League\Fractal\TransformerAbstract;

class JobNewsTransformers extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'id' => $data->id,
            'title' => $data->title,
            'salary' => $data->salary,
            'created_at' => $data->created_at,
            'avatar' => isset($data->user->info) ? url('/').'/'.$data->user->info->avatar: null
        ];
    }
}
