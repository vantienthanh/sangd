<?php

namespace Modules\Enterprisesession\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Enterprisesession\Entities\Enterprisesession;
use Modules\Enterprisesession\Http\Requests\CreateEnterprisesessionRequest;
use Modules\Enterprisesession\Http\Requests\UpdateEnterprisesessionRequest;
use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Session\Repositories\SessionRepository;

class EnterprisesessionController extends AdminBaseController
{
    /**
     * @var EnterprisesessionRepository
     */
    private $enterprisesession;
    private $session;

    public function __construct(EnterprisesessionRepository $enterprisesession, SessionRepository $session)
    {
        parent::__construct();

        $this->enterprisesession = $enterprisesession;
        $this->session = $session;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$enterprisesessions = $this->enterprisesession->all();
        $sessions = $this->session->all();
        return view('enterprisesession::admin.enterprisesessions.index', compact('sessions'));
    }
public function detail (Request $request) {
        $detail = $this->enterprisesession->getByEnterpriseID($request->session_id);
//        dd($detail);
    return view('enterprisesession::admin.enterprisesessions.detail', compact('detail'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('enterprisesession::admin.enterprisesessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEnterprisesessionRequest $request
     * @return Response
     */
    public function store(CreateEnterprisesessionRequest $request)
    {
        $this->enterprisesession->create($request->all());

        return redirect()->route('admin.enterprisesession.enterprisesession.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('enterprisesession::enterprisesessions.title.enterprisesessions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Enterprisesession $enterprisesession
     * @return Response
     */
    public function edit(Enterprisesession $enterprisesession)
    {
        $enterprisesession->load('session');
        return view('enterprisesession::admin.enterprisesessions.edit', compact('enterprisesession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Enterprisesession $enterprisesession
     * @param  UpdateEnterprisesessionRequest $request
     * @return Response
     */
    public function update(Enterprisesession $enterprisesession, UpdateEnterprisesessionRequest $request)
    {
//        dd($request->all());
        $this->enterprisesession->update($enterprisesession, $request->all());

        return redirect()->route('admin.enterprisesession.enterprisesession.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('enterprisesession::enterprisesessions.title.enterprisesessions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Enterprisesession $enterprisesession
     * @return Response
     */
    public function destroy(Enterprisesession $enterprisesession)
    {
        $this->enterprisesession->destroy($enterprisesession);

        return redirect()->route('admin.enterprisesession.enterprisesession.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('enterprisesession::enterprisesessions.title.enterprisesessions')]));
    }
}
