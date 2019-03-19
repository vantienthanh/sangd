<?php

namespace Modules\Membercv\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Membercv\Entities\Membercv;
use Modules\Membercv\Http\Requests\CreateMembercvRequest;
use Modules\Membercv\Http\Requests\UpdateMembercvRequest;
use Modules\Membercv\Repositories\MembercvRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MembercvController extends AdminBaseController
{
    /**
     * @var MembercvRepository
     */
    private $membercv;

    public function __construct(MembercvRepository $membercv)
    {
        parent::__construct();

        $this->membercv = $membercv;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$membercvs = $this->membercv->all();

        return view('membercv::admin.membercvs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('membercv::admin.membercvs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMembercvRequest $request
     * @return Response
     */
    public function store(CreateMembercvRequest $request)
    {
        $this->membercv->create($request->all());

        return redirect()->route('admin.membercv.membercv.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('membercv::membercvs.title.membercvs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Membercv $membercv
     * @return Response
     */
    public function edit(Membercv $membercv)
    {
        return view('membercv::admin.membercvs.edit', compact('membercv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Membercv $membercv
     * @param  UpdateMembercvRequest $request
     * @return Response
     */
    public function update(Membercv $membercv, UpdateMembercvRequest $request)
    {
        $this->membercv->update($membercv, $request->all());

        return redirect()->route('admin.membercv.membercv.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('membercv::membercvs.title.membercvs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Membercv $membercv
     * @return Response
     */
    public function destroy(Membercv $membercv)
    {
        $this->membercv->destroy($membercv);

        return redirect()->route('admin.membercv.membercv.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('membercv::membercvs.title.membercvs')]));
    }
}
