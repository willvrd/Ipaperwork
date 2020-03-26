<?php

namespace Modules\Ipaperwork\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Paperwork extends Model
{
    use Translatable;

    protected $table = 'ipaperwork__paperworks';
    public $translatedAttributes = [];
    protected $fillable = [];
}
