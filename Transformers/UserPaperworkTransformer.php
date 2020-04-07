<?php

namespace Modules\Ipaperwork\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Iprofile\Transformers\UserTransformer;

class UserPaperworkTransformer extends Resource
{
  public function toArray($request)
  {
    $item =  [
      'id' => $this->when($this->id,$this->id),
      'user_id' => $this->when($this->user_id,$this->user_id),
      'user' => new UserTransformer($this->whenLoaded('user')),
      'paperwork_id' => $this->when($this->paperwork_id,$this->paperwork_id),
      'paperwork' => new PaperworkTransformer($this->whenLoaded('paperwork')),
      'status' => $this->status,
      'statusName' => $this->when($this->present()->status,$this->present()->status),
      'comment' => $this->when($this->comment,$this->comment),
      'options' => $this->when($this->options,$this->options),
      'histories' => UserPaperworkHistoryTransformer::collection($this->whenLoaded('histories')),
      'createdAt' => $this->when($this->created_at,$this->created_at),
      'updatedAt' => $this->when($this->updated_at,$this->updated_at),
    ];
    
    return $item;
    
  }
}
