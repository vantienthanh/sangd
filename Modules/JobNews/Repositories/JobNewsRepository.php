<?php

namespace Modules\JobNews\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface JobNewsRepository extends BaseRepository
{
    public function getByUserType ($type);
    public function getByUserID ($id);
}
