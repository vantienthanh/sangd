<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 21/03/2019
 * Time: 09:48
 */

namespace Modules\Profile\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Modules\Profile\Http\Requests\CreateFrontendUserRequest;
use Modules\Profile\Http\Requests\FrontendLoginRequest;
use Modules\Profile\Transformers\TokenTransformers;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Modules\Profile\Entities\FrontendUser as User;

class FrontendUserController extends BaseController
{
    public function login(FrontendLoginRequest $request)
    {
        $data = new \stdClass();
        $credentials = $request->only('username', 'password');
        try {
            if (! $data->token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return $this->response->item($data, new TokenTransformers);
    }

    public function register(CreateFrontendUserRequest $request)
    {
        $data = new \stdClass();
        User::create([
            'username' => $request->get('username'),
            'role' => $request->get('role'),
            'password' => bcrypt($request->get('password')),
        ]);
//        dd(123);
        $user = User::first();
       $data->token = JWTAuth::fromUser($user);

        return $this->response->item($data, new TokenTransformers);
    }


}