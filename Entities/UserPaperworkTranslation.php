<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class UserPaperworkTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ipaperwork__userpaperwork_translations';
}
