<?php

namespace Modules\Ipaperwork\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PaperworkRepository extends BaseRepository
{
    
    public function getItemsBy($params);
  
    public function getItem($criteria, $params);

}
