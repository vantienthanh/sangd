<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 25/03/2019
 * Time: 15:43
 */

namespace Modules\Enterprisesession\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\Enterprisesession\Http\Requests\CreateEnterprisesessionRequest;
use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;
use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\JobNews\Transformers\JobNewsDetailTransformers;

class EnterpriseSessionController extends BaseController
{
    private $enterprisesession;
    private $jobNews;
    public function __construct(EnterprisesessionRepository $enterprisesession, JobNewsRepository $jobNews)
    {
        $this->enterprisesession = $enterprisesession;
        $this->jobNews = $jobNews;
    }

    public function create (CreateEnterprisesessionRequest $request) {
//        dd($request->all());
        $this->enterprisesession->create($request->all());
        return $this->withCustomSuccess();
    }
    public function searchByTableID (Request $request) {
        $table = $this->enterprisesession->find($request->id);
        $data = $this->jobNews->find($table->jobNews_id);
        return $this->response->item($data, new JobNewsDetailTransformers);
    }

    public function getAllMemberByUserID (Request $request) {
        $data = $this->enterprisesession->find($request->id);
    }
}
