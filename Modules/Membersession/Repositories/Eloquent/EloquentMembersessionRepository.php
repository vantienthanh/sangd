<?php

namespace Modules\Membersession\Repositories\Eloquent;

use Modules\Membersession\Repositories\MembersessionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentMembersessionRepository extends EloquentBaseRepository implements MembersessionRepository
{
    public function getListJobJoin ($id) {
        return $this->model->where('user_id', $id)->get();
    }
    public function getByESessionID ($id) {
        return $this->model->where('enterpriseSession_id', $id)->get();
    }
}
