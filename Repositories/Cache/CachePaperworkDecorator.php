<?php

namespace Modules\Ipaperwork\Repositories\Cache;

use Modules\Ipaperwork\Repositories\PaperworkRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePaperworkDecorator extends BaseCacheDecorator implements PaperworkRepository
{
    public function __construct(PaperworkRepository $paperwork)
    {
        parent::__construct();
        $this->entityName = 'ipaperwork.paperworks';
        $this->repository = $paperwork;
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
