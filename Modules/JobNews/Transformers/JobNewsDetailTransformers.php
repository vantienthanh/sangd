<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 15:22
 */

namespace Modules\JobNews\Transformers;


use League\Fractal\TransformerAbstract;

class JobNewsDetailTransformers extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            'id' => $data->id,
            'title' => $data->title,
            'salary' => $data->salary,
            'description' => $data->description,
            'startTime' => $data->startTime,
            'endTime' => $data->endTime,
            'workingTime' => $data->workingTime,
            'amount' => $data->amount,
            'benefit' => $data->benefit,
            'created_at' => $data->created_at,
            'companyName' => $data->user->info? $data->user->info->name : "Không có thông tin về công ty",
            'avatar' => $data->user->info? url('/').'/'.$data->user->info->avatar : null
        ];
    }
}
