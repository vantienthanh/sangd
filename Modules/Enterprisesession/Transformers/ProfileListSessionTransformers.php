<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 02/05/2019
 * Time: 18:31
 */

namespace Modules\Enterprisesession\Transformers;


use League\Fractal\TransformerAbstract;

class ProfileListSessionTransformers extends TransformerAbstract
{
    public function transform ($data) {
        return[
            'id' => $data->session->id,
            'title' => $data->session->title,
            'startTime' => $data->session->startTime,
            'endTime' => $data->session->endTime,
            'location' => $data->session->location
        ];
    }
}