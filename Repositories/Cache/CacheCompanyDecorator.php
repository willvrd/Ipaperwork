<?php

namespace Modules\Ipaperwork\Repositories\Cache;

use Modules\Ipaperwork\Repositories\CompanyRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCompanyDecorator extends BaseCacheDecorator implements CompanyRepository
{
    public function __construct(CompanyRepository $company)
    {
        parent::__construct();
        $this->entityName = 'ipaperwork.companies';
        $this->repository = $company;
    }
}
