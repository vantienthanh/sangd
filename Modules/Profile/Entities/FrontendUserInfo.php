<?php

namespace Modules\Profile\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FrontendUserInfo extends Model
{
//    use Translatable;

    protected $table = 'profile__frontenduserinfos';
//    public $translatedAttributes = [];
    protected $fillable = [];
}
