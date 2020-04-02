<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\UserPaperworkHistory;
use Modules\Ipaperwork\Http\Requests\CreateUserPaperworkHistoryRequest;
use Modules\Ipaperwork\Http\Requests\UpdateUserPaperworkHistoryRequest;
use Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class UserPaperworkHistoryController extends AdminBaseController
{
    /**
     * @var UserPaperworkHistoryRepository
     */
    private $userpaperworkhistory;

    public function __construct(UserPaperworkHistoryRepository $userpaperworkhistory)
    {
        parent::__construct();

        $this->userpaperworkhistory = $userpaperworkhistory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$userpaperworkhistories = $this->userpaperworkhistory->all();

        return view('ipaperwork::admin.userpaperworkhistories.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipaperwork::admin.userpaperworkhistories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserPaperworkHistoryRequest $request
     * @return Response
     */
    public function store(CreateUserPaperworkHistoryRequest $request)
    {
       
        \DB::beginTransaction();
        try {

            $this->userpaperworkhistory->create($request->all());
            \DB::commit();//Commit to Data Base

            return redirect()->route('admin.ipaperwork.userpaperwork.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories')]));

        } catch (\Exception $e) {

            \DB::rollback();
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories')]))->withInput($request->all());

        }
        /*
        return redirect()->route('admin.ipaperwork.userpaperworkhistory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories')]));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UserPaperworkHistory $userpaperworkhistory
     * @return Response
     */
    public function edit(UserPaperworkHistory $userpaperworkhistory)
    {
        return view('ipaperwork::admin.userpaperworkhistories.edit', compact('userpaperworkhistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserPaperworkHistory $userpaperworkhistory
     * @param  UpdateUserPaperworkHistoryRequest $request
     * @return Response
     */
    public function update(UserPaperworkHistory $userpaperworkhistory, UpdateUserPaperworkHistoryRequest $request)
    {
        $this->userpaperworkhistory->update($userpaperworkhistory, $request->all());

        return redirect()->route('admin.ipaperwork.userpaperworkhistory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserPaperworkHistory $userpaperworkhistory
     * @return Response
     */
    public function destroy(UserPaperworkHistory $userpaperworkhistory)
    {
        $this->userpaperworkhistory->destroy($userpaperworkhistory);

        return redirect()->route('admin.ipaperwork.userpaperworkhistory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories')]));
    }
}
