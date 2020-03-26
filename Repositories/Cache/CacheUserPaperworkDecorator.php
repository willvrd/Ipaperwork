<?php

namespace Modules\Ipaperwork\Repositories\Cache;

use Modules\Ipaperwork\Repositories\UserPaperworkRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUserPaperworkDecorator extends BaseCacheDecorator implements UserPaperworkRepository
{
    public function __construct(UserPaperworkRepository $userpaperwork)
    {
        parent::__construct();
        $this->entityName = 'ipaperwork.userpaperworks';
        $this->repository = $userpaperwork;
    }
}
