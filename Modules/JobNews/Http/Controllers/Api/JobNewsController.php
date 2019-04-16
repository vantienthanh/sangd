<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 13:54
 */

namespace Modules\JobNews\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\JobNews\Entities\JobNews;
use Modules\JobNews\Http\Requests\CreateJobNewsRequest;
use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\JobNews\Transformers\JobNewsDetailTransformers;
use Modules\JobNews\Transformers\JobNewsTransformers;

class JobNewsController extends BaseController
{
    /**
     * @var JobNewsRepository
     */
    private $jobnews;

    public function __construct(JobNewsRepository $jobnews)
    {
        $this->jobnews = $jobnews;
    }

    public function index()
    {
        $data = $this->jobnews->paginate('10');
        return $this->response->paginator($data, new JobNewsTransformers)->setStatusCode(200);
    }

    public function detail (Request $request) {
        $data = $this->jobnews->find($request->id);
        return $this->response->item($data, new JobNewsDetailTransformers)->setStatusCode(200);
    }
    public function findByUserID (Request $request) {
        $data = $this->jobnews->getByUserID($request->id);
        return $this->response->collection($data, new JobNewsTransformers);
    }
    public function create (CreateJobNewsRequest $request) {
        $this->jobnews->create($request->all());
        return $this->withCustomSuccess();
    }
    public function update (JobNews $jobnews, CreateJobNewsRequest $request) {
        $this->jobnews->update($jobnews, $request->all());
        return $this->withCustomSuccess();

    }
    public function destroy (Request $request) {
        $this->jobnews->destroy($this->jobnews->find($request->id));
        return $this->withCustomSuccess();

    }
}
