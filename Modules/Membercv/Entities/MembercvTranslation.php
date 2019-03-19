<?php

namespace Modules\Membercv\Entities;

use Illuminate\Database\Eloquent\Model;

class MembercvTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'membercv__membercv_translations';
}
