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
use Illuminate\Support\Facades\Storage;
use Modules\Profile\Entities\FrontendUserInfo;
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
    public function updateInfo(FrontendUserInfo $frontendUserInfo, Request $request) {
        $data = $this->userInfo->find($request->user_id);
        $fileUpload = $request->all();
        if ($request->file('cv')) {
            $uploadedFile = $request->file('cv');
            $filename = $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'public/assets/user/cv/',
                $uploadedFile,
                $filename
            );
            $fileUpload['cv'] = 'assets/user/cv/'.$filename;
        }
        if ($request->file('avatar')) {
            $uploadedFile = $request->file('avatar');
            $filename = $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'public/assets/user/avatar/',
                $uploadedFile,
                $filename
            );
            $fileUpload['avatar'] = 'assets/user/avatar/'.$filename;
        }
        if (isset($data)) {
            //update
            $this->userInfo->update($frontendUserInfo->where('user_id',$request->user_id), $fileUpload);
        } else {
            //create
            $this->userInfo->create($fileUpload);
        }
        return $this->withCustomSuccess();
    }
}
