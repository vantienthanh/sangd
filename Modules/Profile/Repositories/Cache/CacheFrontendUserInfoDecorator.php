<?php

namespace Modules\Profile\Repositories\Cache;

use Modules\Profile\Repositories\FrontendUserInfoRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFrontendUserInfoDecorator extends BaseCacheDecorator implements FrontendUserInfoRepository
{
    public function __construct(FrontendUserInfoRepository $frontenduserinfo)
    {
        parent::__construct();
        $this->entityName = 'profile.frontenduserinfos';
        $this->repository = $frontenduserinfo;
    }
}
