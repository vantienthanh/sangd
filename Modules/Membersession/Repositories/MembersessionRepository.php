<?php

namespace Modules\Membersession\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface MembersessionRepository extends BaseRepository
{
    public function getListMember ($id);
}
