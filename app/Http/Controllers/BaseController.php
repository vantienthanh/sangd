<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 14/03/2019
 * Time: 17:40
 */

namespace App\Http\Controllers;


use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use Helpers;
    public function withCustomSuccess () {
        return response()->json([
            'errors' => false,
            'message' => 'success',
        ]);
    }
}