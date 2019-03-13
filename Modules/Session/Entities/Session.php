<?php

namespace Modules\Session\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use Translatable;

    protected $table = 'session__sessions';
    public $translatedAttributes = [];
    protected $fillable = ['title','location','startTime','endTime'];
}
