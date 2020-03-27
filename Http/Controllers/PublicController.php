<?php

namespace Modules\Ipaperwork\Http\Controllers;

use Log;
use Mockery\CountValidator\Exception;
use Modules\Core\Http\Controllers\BasePublicController;

use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Illuminate\Http\Request;
use Route;
use Modules\Page\Http\Controllers\PublicController as PageController;
use Modules\Ipaperwork\Entities\Status;

class PublicController extends BasePublicController
{
    
    private $paperwork;
   
   
    public function __construct(
        PaperworkRepository $paperwork
    ){
        parent::__construct();
        $this->paperwork = $paperwork;
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

}