<?php

namespace Modules\Enterprisesession\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface EnterprisesessionRepository extends BaseRepository
{
    public function getByEnterpriseID ($id) ;
    public function getUserJoinSessionStatus ($user_id);
}
