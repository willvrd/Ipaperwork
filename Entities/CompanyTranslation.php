<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ipaperwork__company_translations';
}
