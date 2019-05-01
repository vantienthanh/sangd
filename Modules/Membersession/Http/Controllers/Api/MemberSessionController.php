<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 26/03/2019
 * Time: 11:03
 */

namespace Modules\Membersession\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\Membersession\Http\Requests\CreateMembersessionRequest;
use Modules\Membersession\Repositories\MembersessionRepository;
use Modules\Membersession\Transformers\MemberSessionTransformers;

class MemberSessionController extends BaseController
{
    private $memberSession;

    public function __construct(MembersessionRepository $memberSession)
    {
        $this->memberSession = $memberSession;
    }

    public function create(CreateMembersessionRequest $request)
    {
//        dd($request->all());
        $this->memberSession->create($request->all());
        return $this->withCustomSuccess();
    }

    public function getListMember(Request $request)
    {
        $list = $this->memberSession->getListJobJoin($request->id);
//        dd($list);
        return $this->response->collection($list, new MemberSessionTransformers)->setStatusCode(200);
    }
}
