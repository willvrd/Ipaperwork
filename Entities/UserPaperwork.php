<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;

class UserPaperwork extends Model
{
  
    protected $table = 'ipaperwork__user_paperwork';
    protected $fillable = [
        'user_id',
        'paperwork_id',
        'status',
        'comment',
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function getOptionsAttribute($value)
    {
        try {
        return json_decode(json_decode($value));
        } catch (\Exception $e) {
        return json_decode($value);
        }
    }

    

}
