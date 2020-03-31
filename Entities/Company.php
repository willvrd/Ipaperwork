<?php

namespace Modules\Ipaperwork\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Translatable;

    protected $table = 'ipaperwork__companies';
    public $translatedAttributes = [];
    protected $fillable = [];
}
