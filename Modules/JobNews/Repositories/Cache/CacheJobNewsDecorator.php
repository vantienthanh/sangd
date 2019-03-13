<?php

namespace Modules\JobNews\Repositories\Cache;

use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheJobNewsDecorator extends BaseCacheDecorator implements JobNewsRepository
{
    public function __construct(JobNewsRepository $jobnews)
    {
        parent::__construct();
        $this->entityName = 'jobnews.jobnews';
        $this->repository = $jobnews;
    }
}
