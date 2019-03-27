<?php

namespace Modules\Profile\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FrontendUserInfo extends Model
{
//    use Translatable;

    protected $table = 'profile__frontendUserInfos';
//    public $translatedAttributes = [];
    protected $fillable = ['name','phoneNumber','email','address','job','jobDetail','educationLevel','birthday','description','user_id'];
}
