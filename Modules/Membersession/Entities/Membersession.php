<?php

namespace Modules\Membersession\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\FrontendUser;

class Membersession extends Model
{
//    use Translatable;

    protected $table = 'MemberSession';
//    public $translatedAttributes = [];
    protected $fillable = ['user_id','enterpriseSession_id','timeInterview'];

    public function user() {
        return $this->belongsTo(FrontendUser::class, 'user_id', 'id');
    }
}
