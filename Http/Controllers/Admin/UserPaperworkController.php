<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\UserPaperwork;
use Modules\Ipaperwork\Http\Requests\CreateUserPaperworkRequest;
use Modules\Ipaperwork\Http\Requests\UpdateUserPaperworkRequest;
use Modules\Ipaperwork\Repositories\UserPaperworkRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class UserPaperworkController extends AdminBaseController
{
    /**
     * @var UserPaperworkRepository
     */
    private $userpaperwork;

    public function __construct(UserPaperworkRepository $userpaperwork)
    {
        parent::__construct();

        $this->userpaperwork = $userpaperwork;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$userpaperworks = $this->userpaperwork->all();

        return view('ipaperwork::admin.userpaperworks.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipaperwork::admin.userpaperworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserPaperworkRequest $request
     * @return Response
     */
    public function store(CreateUserPaperworkRequest $request)
    {
        $this->userpaperwork->create($request->all());

        return redirect()->route('admin.ipaperwork.userpaperwork.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::userpaperworks.title.userpaperworks')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UserPaperwork $userpaperwork
     * @return Response
     */
    public function edit(UserPaperwork $userpaperwork)
    {
        return view('ipaperwork::admin.userpaperworks.edit', compact('userpaperwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserPaperwork $userpaperwork
     * @param  UpdateUserPaperworkRequest $request
     * @return Response
     */
    public function update(UserPaperwork $userpaperwork, UpdateUserPaperworkRequest $request)
    {
        $this->userpaperwork->update($userpaperwork, $request->all());

        return redirect()->route('admin.ipaperwork.userpaperwork.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::userpaperworks.title.userpaperworks')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserPaperwork $userpaperwork
     * @return Response
     */
    public function destroy(UserPaperwork $userpaperwork)
    {
        $this->userpaperwork->destroy($userpaperwork);

        return redirect()->route('admin.ipaperwork.userpaperwork.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::userpaperworks.title.userpaperworks')]));
    }
}
