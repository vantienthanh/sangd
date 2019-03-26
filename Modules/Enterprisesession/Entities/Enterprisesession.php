<?php

namespace Modules\Enterprisesession\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Membersession\Entities\Membersession;
use Modules\Profile\Entities\FrontendUser;
use Modules\Session\Entities\Session;

class Enterprisesession extends Model
{
//    use Translatable;

    protected $table = 'Enterprise_Sessions';
//    public $translatedAttributes = [];
    protected $fillable = ['status','user_id','session_id'];

    public function session () {
        return $this->belongsTo(Session::class, 'user_id', 'id');
    }
    public function memberSession () {
        return $this->$this->hasMany(Membersession::class,'id','member_id');
    }
    public function user () {
        return $this->belongsTo(FrontendUser::class, 'user_id', 'id');
    }
}
