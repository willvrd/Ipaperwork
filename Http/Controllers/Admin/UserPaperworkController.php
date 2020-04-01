<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\UserPaperwork;
use Modules\Ipaperwork\Http\Requests\CreateUserPaperworkRequest;
use Modules\Ipaperwork\Http\Requests\UpdateUserPaperworkRequest;
use Modules\Ipaperwork\Repositories\UserPaperworkRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Modules\Ipaperwork\Entities\StatusUserPaperwork;

//**** Iprofile
use Modules\Iprofile\Repositories\UserApiRepository;


class UserPaperworkController extends AdminBaseController
{
    /**
     * @var UserPaperworkRepository
     */
    private $userpaperwork;
    /**
     * @var PaperworkRepository
     */
    private $paperwork;
     /**
     * @var Status
     */
    private $statusUserPaperwork;
    private $userApi;


    public function __construct(
        UserPaperworkRepository $userpaperwork,
        PaperworkRepository $paperwork,
        StatusUserPaperwork $statusUserPaperwork,
        UserApiRepository $userApi
    )
    {
        parent::__construct();

        $this->userpaperwork = $userpaperwork;
        $this->paperwork = $paperwork;
        $this->statusUserPaperwork = $statusUserPaperwork;
        $this->userApi = $userApi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        //$attributes = array("paperwork_id"=>$paperworkId);
        //$userpaperworks = $this->userpaperwork->getByAttributes($attributes);
        //$paperwork = $this->paperwork->find($paperworkId);
        $userpaperworks = $this->userpaperwork->all();
        $statusUserPaperwork = $this->statusUserPaperwork->lists();
      
        return view('ipaperwork::admin.userpaperworks.index', compact('userpaperworks','statusUserPaperwork'));
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

        $statusUserPaperwork = $this->statusUserPaperwork->lists();

        $user = $this->userApi->getItem($userpaperwork->user_id,(object)[
            'take' => false,
            'include' => ['fields','roles']
        ]);

         // Fix fields to frontend
        $fields = [];
        if(isset($user->fields) && !empty($user->fields)){
            foreach ($user->fields as $f) {
                 $fields[$f->name] = $f->value;
            }
        }

        return view('ipaperwork::admin.userpaperworks.edit', compact('userpaperwork','fields','statusUserPaperwork'));
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
