<?php

namespace Modules\Enterprisesession\Repositories\Eloquent;

use Modules\Enterprisesession\Repositories\EnterprisesessionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentEnterprisesessionRepository extends EloquentBaseRepository implements EnterprisesessionRepository
{
    public function getByEnterpriseID ($id) {
        return $this->model->where('session_id', $id)->get();
    }
    public function getUserJoinSessionStatus ($user_id) {
        return $this->model->where('user_id', $user_id)->first();
    }
}
