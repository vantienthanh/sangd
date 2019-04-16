<?php

namespace Modules\Membercv\Repositories\Eloquent;

use Modules\Membercv\Repositories\MembercvRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentMembercvRepository extends EloquentBaseRepository implements MembercvRepository
{
    public function byID ($id) {
        return $this->model->where('user_id', $id)->get();
    }
}
