<?php

namespace Modules\JobNews\Repositories\Eloquent;

use Modules\JobNews\Repositories\JobNewsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentJobNewsRepository extends EloquentBaseRepository implements JobNewsRepository
{
    public function getByUserType ($type) {
        return $this->model->where('type', $type)->paginate('10');
    }
    public function getByUserID ($id) {
        return $this->model->where('user_id', $id)->get();
    }
    public function getPartTime () {
        return $this->model->where('workingTime', 'PartTime')->take(12)->get();
    }
    public function getFreeLancer () {
        return $this->model->where('workingTime', 'Freelancer')->get();
    }
}
