<?php

namespace Modules\Ipaperwork\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserPaperworkHistoryTransformer extends Resource
{
  public function toArray($request)
  {
    $item =  [
      'id' => $this->when($this->id,$this->id),
      'userPaperworkId' => $this->when($this->user_paperwork_id,$this->user_paperwork_id),
      'status' => $this->status,
      'statusName' => $this->when($this->present()->status,$this->present()->status),
      'comment' => $this->when($this->comment,$this->comment),
      'createdAt' => $this->when($this->created_at,$this->created_at),
      'updatedAt' => $this->when($this->updated_at,$this->updated_at)
    ];
    
    return $item;
    
  }
}
