<?php

namespace Modules\Ipaperwork\Repositories\Cache;

use Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUserPaperworkHistoryDecorator extends BaseCacheDecorator implements UserPaperworkHistoryRepository
{
    public function __construct(UserPaperworkHistoryRepository $userpaperworkhistory)
    {
        parent::__construct();
        $this->entityName = 'ipaperwork.userpaperworkhistories';
        $this->repository = $userpaperworkhistory;
    }
}
