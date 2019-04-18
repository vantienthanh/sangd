<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 27/03/2019
 * Time: 23:36
 */

namespace Modules\Session\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;
use Modules\Session\Repositories\SessionRepository;
use Modules\Session\Transformers\EnterpriseJoinSessionListTransformers;
use Modules\Session\Transformers\ListSessionTransformers;
use Modules\Session\Transformers\SessionDetailTransformers;
use stdClass;

class SessionController extends BaseController
{
    private $session;
    private $enterprisesession;

    public function __construct(SessionRepository $session, EnterprisesessionRepository $enterprisesession)
    {
        $this->session = $session;
        $this->enterprisesession = $enterprisesession;
    }

    public function getList()
    {
        $data = $this->session->paginate('10');
        return $this->response->paginator($data, new ListSessionTransformers);
    }

    public function sessionDetail(Request $request)
    {
        $data = new \stdClass();
        $data->session = $this->session->find($request->id);
        $data->eSession = $this->enterprisesession->getUserJoinSessionStatus($request->user_id, $request->id);
        return $this->response->item($data, new SessionDetailTransformers);
    }

    public function detailListEnterprise(Request $request)
    {
        $data = $this->session->find($request->id)->enterpriseSession;
        return $this->response->collection($data, new EnterpriseJoinSessionListTransformers);
    }
}
