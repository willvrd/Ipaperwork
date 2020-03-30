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

    /**
     * List or resources
     *
     * @return collection
     */
    public function getItemsBy($params)
    {
        return $this->remember(function () use ($params) {
        return $this->repository->getItemsBy($params);
        });
    }
    
    /**
     * find a resource by id or slug
     *
     * @return object
     */
    public function getItem($criteria, $params)
    {
        return $this->remember(function () use ($criteria, $params) {
        return $this->repository->getItem($criteria, $params);
        });
    }

}
