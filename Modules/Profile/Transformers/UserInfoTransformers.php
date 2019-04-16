<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 14:05
 */

namespace Modules\Profile\Transformers;


use League\Fractal\TransformerAbstract;

class UserInfoTransformers extends TransformerAbstract
{
 public function transform ($data) {
     return [
         'id' => $data->id,
         'name' => $data->name,
         'avatar' => url('/').'/'.$data->avatar,
         'email' => $data->email,
         'cv' => url('/').'/'.$data->cv,
     ];
 }
}
