<?php

namespace Modules\Ipaperwork\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class UserPaperwork extends Model
{
    use Translatable;

    protected $table = 'ipaperwork__userpaperworks';
    public $translatedAttributes = [];
    protected $fillable = [];
}
