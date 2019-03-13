<?php

namespace Modules\Membersession\Repositories\Cache;

use Modules\Membersession\Repositories\MembersessionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMembersessionDecorator extends BaseCacheDecorator implements MembersessionRepository
{
    public function __construct(MembersessionRepository $membersession)
    {
        parent::__construct();
        $this->entityName = 'membersession.membersessions';
        $this->repository = $membersession;
    }
}
