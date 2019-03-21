<?php

namespace Modules\Profile\Repositories\Cache;

use Modules\Profile\Repositories\FrontendUserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFrontendUserDecorator extends BaseCacheDecorator implements FrontendUserRepository
{
    public function __construct(FrontendUserRepository $frontenduser)
    {
        parent::__construct();
        $this->entityName = 'profile.frontendusers';
        $this->repository = $frontenduser;
    }
}
