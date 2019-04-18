<?php

namespace Modules\Profile\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\FrontendUser;
use Modules\Profile\Http\Requests\CreateFrontendUserRequest;
use Modules\Profile\Http\Requests\UpdateFrontendUserRequest;
use Modules\Profile\Repositories\FrontendUserRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FrontendUserController extends AdminBaseController
{
    /**
     * @var FrontendUserRepository
     */
    private $frontenduser;

    public function __construct(FrontendUserRepository $frontenduser)
    {
        parent::__construct();

        $this->frontenduser = $frontenduser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $frontendusers = $this->frontenduser->all();

        return view('profile::admin.frontendusers.index', compact('frontendusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile::admin.frontendusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFrontendUserRequest $request
     * @return Response
     */
    public function store(CreateFrontendUserRequest $request)
    {
        $this->frontenduser->create($request->all());

        return redirect()->route('admin.profile.frontenduser.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('profile::frontendusers.title.frontendusers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FrontendUser $frontenduser
     * @return Response
     */
    public function edit(FrontendUser $frontenduser)
    {
        return view('profile::admin.frontendusers.edit', compact('frontenduser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FrontendUser $frontenduser
     * @param  UpdateFrontendUserRequest $request
     * @return Response
     */
    public function update(FrontendUser $frontenduser, UpdateFrontendUserRequest $request)
    {
        $this->frontenduser->update($frontenduser, $request->all());

        return redirect()->route('admin.profile.frontenduser.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('profile::frontendusers.title.frontendusers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FrontendUser $frontenduser
     * @return Response
     */
    public function destroy(FrontendUser $frontenduser)
    {
        $this->frontenduser->destroy($frontenduser);

        return redirect()->route('admin.profile.frontenduser.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('profile::frontendusers.title.frontendusers')]));
    }
}
