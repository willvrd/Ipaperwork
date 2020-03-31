<?php

namespace Modules\Ipaperwork\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Paperwork extends Model
{
    use Translatable, MediaRelation;

    protected $table = 'ipaperwork__paperworks';
    public $translatedAttributes = [
        'summary',
        'title',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $fillable = [
        'status',
        'options',
        'summary',
        'title',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'options_translate'
    ];

    protected $casts = [
        'options' => 'array'
    ];


    public function users(){
        return $this->belongsToMany(UserPaperwork::class, 'ipaperwork__user_paperwork');
    }

    public function companies(){
        return $this->belongsToMany(Company::class, 'ipaperwork__company_paperwork');
    }

    public function getOptionsAttribute($value)
    {
        try {
        return json_decode(json_decode($value));
        } catch (\Exception $e) {
        return json_decode($value);
        }
    }

    public function getMainImageAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'mainimage')->first();
        if (!$thumbnail) {
        if (isset($this->options->mainimage)) {
            $image = [
            'mimeType' => 'image/jpeg',
            'path' => url($this->options->mainimage)
            ];
        } else {
            $image = [
            'mimeType' => 'image/jpeg',
            'path' => url('modules/iblog/img/post/default.jpg')
            ];
        }
        } else {
        $image = [
            'mimeType' => $thumbnail->mimetype,
            'path' => $thumbnail->path_string
        ];
        }
        return json_decode(json_encode($image));
    }

    public function getGalleryAttribute()
    {
        $gallery = $this->filesByZone('gallery')->get();
        $response = [];
        foreach ($gallery as $img) {
        array_push($response, [
            'mimeType' => $img->mimetype,
            'path' => $img->path_string
        ]);
        }
        return json_decode(json_encode($response));
    }

    public function getUrlAttribute()
    {

        return \URL::route(\LaravelLocalization::getCurrentLocale() . '.ipaperwork.paperwork', [$this->slug]);

    }
   

    /**
     * Magic Method modification to allow dynamic relations to other entities.
     * @var $value
     * @var $destination_path
     * @return string
     */
    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.ipaperwork.config.relations.paperwork', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
    


}
