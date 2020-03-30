<?php

namespace Modules\Ipaperwork\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface UserPaperworkRepository extends BaseRepository
{

	public function getItemsBy($params);
  
    public function getItem($criteria, $params);
    
}
