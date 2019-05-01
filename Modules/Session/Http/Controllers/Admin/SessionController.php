<?php

namespace Modules\Session\Http\Controllers\Admin;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Session\Entities\Session;
use Modules\Session\Http\Requests\CreateSessionRequest;
use Modules\Session\Http\Requests\UpdateSessionRequest;
use Modules\Session\Repositories\SessionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SessionController extends AdminBaseController
{
    /**
     * @var SessionRepository
     */
    private $session;
    private $config;

    public function __construct(SessionRepository $session,Repository $config)
    {
        parent::__construct();

        $this->session = $session;
        $this->config = $config;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sessions = $this->session->all();

        return view('session::admin.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $location = $this->config->get('asgard.core.tinh-thanh');
        return view('session::admin.sessions.create',compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSessionRequest $request
     * @return Response
     */
    public function store(CreateSessionRequest $request)
    {
//        dd(strtotime($request->startTime));
        $data = $request;
        $data->startTime =date('Y-m-d H:m:s',strtotime($data->startTime));
        $data->endTime = date('Y-m-d H:m:s',strtotime($data->endTime));
        $this->session->create($data->all());

        return redirect()->route('admin.session.session.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('session::sessions.title.sessions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Session $session
     * @return Response
     */
    public function edit(Session $session)
    {
        return view('session::admin.sessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Session $session
     * @param  UpdateSessionRequest $request
     * @return Response
     */
    public function update(Session $session, UpdateSessionRequest $request)
    {
        $this->session->update($session, $request->all());

        return redirect()->route('admin.session.session.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('session::sessions.title.sessions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Session $session
     * @return Response
     */
    public function destroy(Session $session)
    {
        $this->session->destroy($session);

        return redirect()->route('admin.session.session.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('session::sessions.title.sessions')]));
    }
}
