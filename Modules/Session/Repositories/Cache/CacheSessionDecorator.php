<?php

namespace Modules\Session\Repositories\Cache;

use Modules\Session\Repositories\SessionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSessionDecorator extends BaseCacheDecorator implements SessionRepository
{
    public function __construct(SessionRepository $session)
    {
        parent::__construct();
        $this->entityName = 'session.sessions';
        $this->repository = $session;
    }
}
