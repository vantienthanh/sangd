<?php

namespace Modules\Membercv\Repositories\Cache;

use Modules\Membercv\Repositories\MembercvRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMembercvDecorator extends BaseCacheDecorator implements MembercvRepository
{
    public function __construct(MembercvRepository $membercv)
    {
        parent::__construct();
        $this->entityName = 'membercv.membercvs';
        $this->repository = $membercv;
    }
}
