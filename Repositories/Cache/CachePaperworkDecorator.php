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
}
