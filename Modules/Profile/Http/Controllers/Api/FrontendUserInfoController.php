<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 09:48
 */

namespace Modules\Profile\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\Profile\Repositories\FrontendUserInfoRepository;
use Modules\Profile\Transformers\UserInfoTransformers;

class FrontendUserInfoController extends BaseController
{
    private $userInfo;
    public function __construct(FrontendUserInfoRepository $frontenduserinfo)
    {
        $this->userInfo = $frontenduserinfo;
    }

    public function getInfo(Request $request) {
        $data = $this->userInfo->find($request->id);
        if (isset($data)){
            return $this->response->item($data, new UserInfoTransformers);
        }
        return response()->json(['error' => 'No data'], 200);
    }
}
