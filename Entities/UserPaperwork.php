<?php

namespace Modules\Ipaperwork\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Ipaperwork\Presenters\UserPaperworkPresenter;

class UserPaperwork extends Model
{
  
    use PresentableTrait;

    protected $table = 'ipaperwork__user_paperwork';
    protected $presenter = UserPaperworkPresenter::class;
    protected $fillable = [
        'user_id',
        'paperwork_id',
        'company_id',
        'city',
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

    public function Paperwork()
    {
        return $this->belongsTo(Paperwork::class);
    }

    public function user(){
        $driver = config('asgard.user.config.driver');
        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User",'user_id');
    }

    public function histories()
    {
        return $this->hasMany(UserPaperworkHistory::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    

}
