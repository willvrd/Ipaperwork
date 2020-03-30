<?php

namespace Modules\Ipaperwork\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PaperworkTransformer extends Resource
{
  public function toArray($request)
  {
    $item =  [
      'id' => $this->when($this->id,$this->id),
      'title' => $this->when($this->title,$this->title),
      'description' => $this->when($this->description,$this->description),
      'mainImage' => $this->mainImage,
      'options' => $this->when($this->options,$this->options),
      'createdAt' => $this->when($this->created_at,$this->created_at),
      'updatedAt' => $this->when($this->updated_at,$this->updated_at)
    ];
    
    // TRANSLATIONS
    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {
        if ($this->hasTranslation($lang)) {
          $item[$lang]['title'] = $this->hasTranslation($lang) ?
            $this->translate("$lang")['title'] : '';
          $item[$lang]['description'] = $this->hasTranslation($lang) ?
            $this->translate("$lang")['description'] : '';
        }
      }
    }

    return $item;
    
  }
}
