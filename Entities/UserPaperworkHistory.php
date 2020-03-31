<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class UserPaperworkHistory extends Model
{
    

    protected $table = 'ipaperwork__user_paperwork_histories';
    protected $fillable = [
    	'userpaperwork_id',
    	'status',
    	'notify',
    	'comment'
    ];

    public function userPaperwork()
    {
        return $this->belongsTo(UserPaperwork::class);
    }


}
