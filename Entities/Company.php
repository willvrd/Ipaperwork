<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $table = 'ipaperwork__companies';
    protected $fillable = [
    	'title',
    	'description',
    	'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function paperworks(){
        return $this->belongsToMany(Paperwork::class,'ipaperwork__company_paperwork');
    }

    public function userpaperworks()
    {
        return $this->hasMany(UserPaperwork::class);
    }

    public function getOptionsAttribute($value)
    {
        try {
        return json_decode(json_decode($value));
        } catch (\Exception $e) {
        return json_decode($value);
        }
    }


}
