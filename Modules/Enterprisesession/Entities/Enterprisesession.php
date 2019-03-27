<?php

namespace Modules\Enterprisesession\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Membersession\Entities\Membersession;
use Modules\Session\Entities\Session;

class Enterprisesession extends Model
{
//    use Translatable;

    protected $table = 'enterprisesession__enterprisesessions';
//    public $translatedAttributes = [];
    protected $fillable = [];

    public function session () {
        return $this->belongsTo(Session::class, 'enterprise_id', 'id');
    }
    public function memberSession () {
        return $this->$this->hasMany(Membersession::class,'id','member_id');
    }
}
