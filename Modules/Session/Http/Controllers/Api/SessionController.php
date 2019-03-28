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
use Modules\Session\Repositories\SessionRepository;
use Modules\Session\Transformers\ListSessionTransformers;

class SessionController extends BaseController
{
    private $session;
    public function __construct(SessionRepository $session)
    {
        $this->session = $session;
    }

    public function getList () {
        $data = $this->session->paginate('10');
        return $this->response->paginator($data, new ListSessionTransformers);
    }

    public function detail (Request $request) {
        $data = $this->session->find($request->id)->enterpriseSession;
        dd($data);
    }
}
