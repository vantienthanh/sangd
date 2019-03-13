<?php

namespace Modules\Membersession\Entities;

use Illuminate\Database\Eloquent\Model;

class MembersessionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'membersession__membersession_translations';
}
