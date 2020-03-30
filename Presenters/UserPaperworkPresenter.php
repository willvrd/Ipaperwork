<?php

namespace Modules\Ipaperwork\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Ipaperwork\Entities\StatusUserPaperwork;

class UserPaperworkPresenter extends Presenter
{
  
    protected $status;
   
    public function __construct($entity){

        parent::__construct($entity);
        $this->status = app('Modules\Ipaperwork\Entities\StatusUserPaperwork');
    }

    public function status(){
        return $this->status->get($this->entity->status);
    }

    public function statusLabelClass(){
        switch ($this->entity->status){

            case StatusUserPaperwork::DENIED:
                return 'bg-red';
                break;

            case StatusUserPaperwork::APPROVED:
                return 'bg-green';
                break;

            case StatusUserPaperwork::PENDING:
                return 'bg-yellow';
                break;

            default:
                return 'bg-red';
                break;

        }
    }


}
