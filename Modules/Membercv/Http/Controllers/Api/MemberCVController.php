<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 19/03/2019
 * Time: 18:00
 */

namespace Modules\Membercv\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Modules\Membercv\Entities\Membercv;
use Modules\Membercv\Http\Requests\CreateMembercvRequest;
use Modules\Membercv\Repositories\MembercvRepository;
use Modules\Membercv\Transformers\MemberCVTransformers;

class MemberCVController extends BaseController
{
    private $memberCV;
    public function __construct(MembercvRepository $memberCV)
    {
        $this->memberCV = $memberCV;
    }

    public function index()
    {
        $data = $this->memberCV->paginate('10');
        return $this->response->paginator($data, new MemberCVTransformers)->setStatusCode(200);
    }

    public function detail (Request $request) {
        $data = $this->memberCV->find($request->id);
        return $this->response->item($data, new JobNewsDetailTransformers)->setStatusCode(200);
    }

    public function create (CreateMembercvRequest $request) {
        $this->memberCV->create($request->all());
        return $this->withCustomSuccess();
    }

    public function update (Membercv $membercv, CreateMembercvRequest $request) {
        $this->memberCV->update($membercv, $request->all());
        return $this->withCustomSuccess();

    }

    public function destroy (Request $request) {
        $this->memberCV->destroy($this->memberCV->find($request->id));
        return $this->withCustomSuccess();

    }
}