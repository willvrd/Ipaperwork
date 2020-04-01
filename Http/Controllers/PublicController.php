<?php

namespace Modules\Ipaperwork\Http\Controllers;

use Log;
use Mockery\CountValidator\Exception;
use Modules\Core\Http\Controllers\BasePublicController;

use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Illuminate\Http\Request;
use Modules\Ipaperwork\Entities\Company;
use Route;
use Modules\Page\Http\Controllers\PublicController as PageController;

use Modules\Ipaperwork\Entities\Status;
use Modules\Ipaperwork\Repositories\CompanyRepository;
use Modules\Ipaperwork\Http\Requests\CreateUserPaperworkRequest;

//**** User
use Modules\User\Contracts\Authentication;
//**** Iprofile
use Modules\Iprofile\Repositories\UserApiRepository;

class PublicController extends BasePublicController
{
    
    private $paperwork;
    protected $auth;
    private $userApi;
    private $company;
   
    public function __construct(
        PaperworkRepository $paperwork,
        UserApiRepository $userApi,
        CompanyRepository $company
    ){
        parent::__construct();
        $this->paperwork = $paperwork;
        $this->auth = app(Authentication::class);
        $this->userApi = $userApi;
        $this->company = $company;
    }

    public function index(Request $request)
    {

        try{

           //Default Template
           $tpl = 'ipaperwork::frontend.index';
           $ttpl = 'ipaperwork.index';

           if (view()->exists($ttpl)) $tpl = $ttpl;

           $paperworks = $this->paperwork->paginate(12);

           return view($tpl, compact('paperworks'));
           
        }catch (\Exception $e){
            \Log::error($e);
            return abort(404);
        }

    }

    public function show($slug)
    {

        try{

            //Default Template
            $tpl = 'ipaperwork::frontend.show';
            $ttpl = 'ipaperwork.show';

            if (view()->exists($ttpl)) $tpl = $ttpl;

            $paperwork = $this->paperwork->findBySlug($slug);

            return view($tpl, compact('paperwork'));

        }catch (\Exception $e){
            \Log::error($e);
            return abort(404);
        }
       
    }

    public function quotation($slug){
        try{

            //Default Template
            $tpl = 'ipaperwork::frontend.quotation';
            $ttpl = 'ipaperwork.quotation';

            if (view()->exists($ttpl)) $tpl = $ttpl;

            $paperwork = $this->paperwork->findBySlug($slug);

            // Process to Get Fields User
            $user1 = $this->auth->user();
            $user = $this->userApi->getItem($user1->id,(object)[
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
            // Validate fields requireds
            if(empty($fields) && count($fields)==0){
                return redirect()->route('account.profile.index');
            }

            return view($tpl, compact('paperwork','user','fields'));

        }catch (\Exception $e){
            \Log::error($e);
            return abort(404);
        }
    }

    //UserPaperwork Create
    public function quotationCreate(CreateUserPaperworkRequest $request){

        dd($request);

    }

}