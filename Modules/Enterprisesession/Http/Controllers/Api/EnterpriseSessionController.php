<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 25/03/2019
 * Time: 15:43
 */

namespace Modules\Enterprisesession\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Modules\Enterprisesession\Http\Requests\CreateEnterprisesessionRequest;
use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;

class EnterpriseSessionController extends BaseController
{
    private $enterprisesession;

    public function __construct(EnterprisesessionRepository $enterprisesession)
    {
        $this->enterprisesession = $enterprisesession;
    }

    public function create (CreateEnterprisesessionRequest $request) {
//        dd($request->all());
        $this->enterprisesession->create($request->all());
        return $this->withCustomSuccess();
    }
}