<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 28/03/2019
 * Time: 00:03
 */

namespace Modules\Session\Transformers;


use League\Fractal\TransformerAbstract;

class SessionDetailTransformers extends TransformerAbstract
{
    public function transform($data)
    {
        return [
            "title" => $data->session->title,
            "location" => $data->session->location,
            "startTime" => $data->session->startTime,
            "endTime" => $data->session->endTime,
            "userStatus" => $data->eSession ? $data->eSession->status : null
        ];
    }
}
