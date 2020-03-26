<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\Paperwork;
use Modules\Ipaperwork\Http\Requests\CreatePaperworkRequest;
use Modules\Ipaperwork\Http\Requests\UpdatePaperworkRequest;
use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Ipaperwork\Entities\Status;

class PaperworkController extends AdminBaseController
{
    /**
     * @var PaperworkRepository
     */
    private $paperwork;

     /**
     * @var Status
     */
    private $status;

    public function __construct(
        PaperworkRepository $paperwork,
        Status $status
    )
    {
        parent::__construct();

        $this->paperwork = $paperwork;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paperworks = $this->paperwork->all();
        return view('ipaperwork::admin.paperworks.index', compact('paperworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $status = $this->status->lists();
        return view('ipaperwork::admin.paperworks.create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePaperworkRequest $request
     * @return Response
     */
    public function store(CreatePaperworkRequest $request)
    {

        \DB::beginTransaction();
        try {

            $this->paperwork->create($request->all());
            \DB::commit();//Commit to Data Base

            return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));

        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::paperworks.title.paperworks')]))->withInput($request->all());

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Paperwork $paperwork
     * @return Response
     */
    public function edit(Paperwork $paperwork)
    {
        $status = $this->status->lists();
        return view('ipaperwork::admin.paperworks.edit', compact('paperwork','status'));
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

        \DB::beginTransaction();
        try {
            $this->paperwork->update($paperwork, $request->all());
            \DB::commit();//Commit to Data Base

            return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));

        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::paperworks.title.paperworks')]))->withInput($request->all());

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Paperwork $paperwork
     * @return Response
     */
    public function destroy(Paperwork $paperwork)
    {

        try {
            
            $this->paperwork->destroy($paperwork);

            return redirect()->route('admin.ipaperwork.paperwork.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));
        
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::paperworks.title.paperworks')]));

        }

    }
}
