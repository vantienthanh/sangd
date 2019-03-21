<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 10:50
 */

namespace Modules\Profile\Transformers;


use League\Fractal\TransformerAbstract;

class TokenTransformers extends TransformerAbstract
{
    public function transform ($data) {
        return [
          'token' => $data->token
        ];
    }
}