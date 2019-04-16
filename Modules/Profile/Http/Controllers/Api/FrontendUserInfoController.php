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
        dd($request->all());
        $data = $this->userInfo->find($request->id);
        $fileUpload = $request->all();
        if ($request->hasFile($request->cv)) {
            $uploadedFile = $request->file('cv');
            $filename = $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'public/assets/user/cv/',
                $uploadedFile,
                $filename
            );
            $fileUpload['cv'] = $filename;
        }
        if ($request->hasFile($request->avatar)) {
            $uploadedFile = $request->file('avatar');
            $filename = $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'public/assets/user/avatar/',
                $uploadedFile,
                $filename
            );
            $fileUpload['avatar'] = $filename;
        }
        if (isset($data)) {
            //update
            $this->userInfo->update($frontendUserInfo, $fileUpload);
        } else {
            //create
            $this->userInfo->create($fileUpload);
        }
        return $this->withCustomSuccess();
    }
}
