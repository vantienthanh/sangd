<?php

namespace Modules\Session\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Enterprisesession\Entities\Enterprisesession;

class Session extends Model
{
//    use Translatable;

    protected $table = 'sessions';
//    public $translatedAttributes = [];
    protected $fillable = ['title','location','startTime','endTime'];

    public function enterpriseSession () {
        return $this->hasMany(Enterprisesession::class);
    }
}
