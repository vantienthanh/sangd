<?php

namespace Modules\Membersession\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Membersession\Entities\Membersession;
use Modules\Membersession\Http\Requests\CreateMembersessionRequest;
use Modules\Membersession\Http\Requests\UpdateMembersessionRequest;
use Modules\Membersession\Repositories\MembersessionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MembersessionController extends AdminBaseController
{
    /**
     * @var MembersessionRepository
     */
    private $membersession;

    public function __construct(MembersessionRepository $membersession)
    {
        parent::__construct();

        $this->membersession = $membersession;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$membersessions = $this->membersession->all();

        return view('membersession::admin.membersessions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('membersession::admin.membersessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMembersessionRequest $request
     * @return Response
     */
    public function store(CreateMembersessionRequest $request)
    {
        $this->membersession->create($request->all());

        return redirect()->route('admin.membersession.membersession.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('membersession::membersessions.title.membersessions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Membersession $membersession
     * @return Response
     */
    public function edit(Membersession $membersession)
    {
        return view('membersession::admin.membersessions.edit', compact('membersession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Membersession $membersession
     * @param  UpdateMembersessionRequest $request
     * @return Response
     */
    public function update(Membersession $membersession, UpdateMembersessionRequest $request)
    {
        $this->membersession->update($membersession, $request->all());

        return redirect()->route('admin.membersession.membersession.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('membersession::membersessions.title.membersessions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Membersession $membersession
     * @return Response
     */
    public function destroy(Membersession $membersession)
    {
        $this->membersession->destroy($membersession);

        return redirect()->route('admin.membersession.membersession.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('membersession::membersessions.title.membersessions')]));
    }
}
