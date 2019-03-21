<?php

namespace Modules\Profile\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\FrontendUserInfo;
use Modules\Profile\Http\Requests\CreateFrontendUserInfoRequest;
use Modules\Profile\Http\Requests\UpdateFrontendUserInfoRequest;
use Modules\Profile\Repositories\FrontendUserInfoRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FrontendUserInfoController extends AdminBaseController
{
    /**
     * @var FrontendUserInfoRepository
     */
    private $frontenduserinfo;

    public function __construct(FrontendUserInfoRepository $frontenduserinfo)
    {
        parent::__construct();

        $this->frontenduserinfo = $frontenduserinfo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$frontenduserinfos = $this->frontenduserinfo->all();

        return view('profile::admin.frontenduserinfos.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile::admin.frontenduserinfos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFrontendUserInfoRequest $request
     * @return Response
     */
    public function store(CreateFrontendUserInfoRequest $request)
    {
        $this->frontenduserinfo->create($request->all());

        return redirect()->route('admin.profile.frontenduserinfo.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('profile::frontenduserinfos.title.frontenduserinfos')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FrontendUserInfo $frontenduserinfo
     * @return Response
     */
    public function edit(FrontendUserInfo $frontenduserinfo)
    {
        return view('profile::admin.frontenduserinfos.edit', compact('frontenduserinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FrontendUserInfo $frontenduserinfo
     * @param  UpdateFrontendUserInfoRequest $request
     * @return Response
     */
    public function update(FrontendUserInfo $frontenduserinfo, UpdateFrontendUserInfoRequest $request)
    {
        $this->frontenduserinfo->update($frontenduserinfo, $request->all());

        return redirect()->route('admin.profile.frontenduserinfo.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('profile::frontenduserinfos.title.frontenduserinfos')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FrontendUserInfo $frontenduserinfo
     * @return Response
     */
    public function destroy(FrontendUserInfo $frontenduserinfo)
    {
        $this->frontenduserinfo->destroy($frontenduserinfo);

        return redirect()->route('admin.profile.frontenduserinfo.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('profile::frontenduserinfos.title.frontenduserinfos')]));
    }
}
