<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Ipaperwork\Presenters\UserPaperworkPresenter;

class UserPaperworkHistory extends Model
{
    
    use PresentableTrait;
    protected $presenter = UserPaperworkPresenter::class;
    
    protected $table = 'ipaperwork__user_paperwork_histories';
    protected $fillable = [
    	'user_paperwork_id',
    	'status',
    	'notify',
    	'comment'
    ];

    public function userPaperwork()
    {
        return $this->belongsTo(UserPaperwork::class);
    }


}
