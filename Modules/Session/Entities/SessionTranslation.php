<?php

namespace Modules\Session\Entities;

use Illuminate\Database\Eloquent\Model;

class SessionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'session__session_translations';
}
