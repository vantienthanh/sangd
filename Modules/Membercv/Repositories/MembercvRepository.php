<?php

namespace Modules\Membercv\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface MembercvRepository extends BaseRepository
{
    public function byID ($id);
}
