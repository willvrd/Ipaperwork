<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class PaperworkTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ipaperwork__paperwork_translations';
}
