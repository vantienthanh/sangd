<?php

namespace Modules\JobNews\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\JobNews\Entities\JobNews;
use Modules\JobNews\Http\Requests\CreateJobNewsRequest;
use Modules\JobNews\Http\Requests\UpdateJobNewsRequest;
use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class JobNewsController extends AdminBaseController
{
    /**
     * @var JobNewsRepository
     */
    private $jobnews;

    public function __construct(JobNewsRepository $jobnews)
    {
        parent::__construct();

        $this->jobnews = $jobnews;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$jobnews = $this->jobnews->all();

        return view('jobnews::admin.jobnews.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('jobnews::admin.jobnews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateJobNewsRequest $request
     * @return Response
     */
    public function store(CreateJobNewsRequest $request)
    {
        $this->jobnews->create($request->all());

        return redirect()->route('admin.jobnews.jobnews.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('jobnews::jobnews.title.jobnews')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  JobNews $jobnews
     * @return Response
     */
    public function edit(JobNews $jobnews)
    {
        return view('jobnews::admin.jobnews.edit', compact('jobnews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JobNews $jobnews
     * @param  UpdateJobNewsRequest $request
     * @return Response
     */
    public function update(JobNews $jobnews, UpdateJobNewsRequest $request)
    {
        $this->jobnews->update($jobnews, $request->all());

        return redirect()->route('admin.jobnews.jobnews.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('jobnews::jobnews.title.jobnews')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  JobNews $jobnews
     * @return Response
     */
    public function destroy(JobNews $jobnews)
    {
        $this->jobnews->destroy($jobnews);

        return redirect()->route('admin.jobnews.jobnews.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('jobnews::jobnews.title.jobnews')]));
    }
}
