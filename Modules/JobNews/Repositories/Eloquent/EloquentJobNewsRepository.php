<?php

namespace Modules\JobNews\Repositories\Eloquent;

use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentJobNewsRepository extends EloquentBaseRepository implements JobNewsRepository
{
    public function getByUserType ($type) {
        return $this->model->where('type', $type)->paginate('10');
    }
}
