<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 27/03/2019
 * Time: 23:38
 */

namespace Modules\Session\Transformers;


use League\Fractal\TransformerAbstract;

class ListSessionTransformers extends TransformerAbstract
{
    public function transform ($data) {
        return [
            'id' => $data->id,
            'title' => $data->title,
            'startTime' => $data->startTime,
            'endTime' => $data->endTime,
            'location' => $data->location
        ];
    }
}
