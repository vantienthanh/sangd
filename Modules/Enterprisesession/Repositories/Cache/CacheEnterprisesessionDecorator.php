<?php

namespace Modules\Enterprisesession\Repositories\Cache;

use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEnterprisesessionDecorator extends BaseCacheDecorator implements EnterprisesessionRepository
{
    public function __construct(EnterprisesessionRepository $enterprisesession)
    {
        parent::__construct();
        $this->entityName = 'enterprisesession.enterprisesessions';
        $this->repository = $enterprisesession;
    }
}
