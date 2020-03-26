<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\Paperwork;
use Modules\Ipaperwork\Http\Requests\CreatePaperworkRequest;
use Modules\Ipaperwork\Http\Requests\UpdatePaperworkRequest;
use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PaperworkController extends AdminBaseController
{
    /**
     * @var PaperworkRepository
     */
    private $paperwork;

    public function __construct(PaperworkRepository $paperwork)
    {
        parent::__construct();

        $this->paperwork = $paperwork;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$paperworks = $this->paperwork->all();

        return view('ipaperwork::admin.paperworks.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipaperwork::admin.paperworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePaperworkRequest $request
     * @return Response
     */
    public function store(CreatePaperworkRequest $request)
    {
        $this->paperwork->create($request->all());

        return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Paperwork $paperwork
     * @return Response
     */
    public function edit(Paperwork $paperwork)
    {
        return view('ipaperwork::admin.paperworks.edit', compact('paperwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Paperwork $paperwork
     * @param  UpdatePaperworkRequest $request
     * @return Response
     */
    public function update(Paperwork $paperwork, UpdatePaperworkRequest $request)
    {
        $this->paperwork->update($paperwork, $request->all());

        return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Paperwork $paperwork
     * @return Response
     */
    public function destroy(Paperwork $paperwork)
    {
        $this->paperwork->destroy($paperwork);

        return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));
    }
}
