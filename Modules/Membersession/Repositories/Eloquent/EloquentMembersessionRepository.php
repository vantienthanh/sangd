<?php

namespace Modules\Membersession\Repositories\Eloquent;

use Modules\Membersession\Repositories\MembersessionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentMembersessionRepository extends EloquentBaseRepository implements MembersessionRepository
{
    public function getListMember ($id) {
        return $this->model->where('enterpriseSession_id', $id)->paginate('10');
    }
}
