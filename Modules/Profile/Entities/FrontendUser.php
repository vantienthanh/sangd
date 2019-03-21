<?php

namespace Modules\Profile\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class FrontendUser extends Authenticatable implements JWTSubject
{
//    use Translatable;
    use Notifiable;
    protected $table = 'profile__frontendUsers';
//    public $translatedAttributes = [];
    protected $fillable = ['username', 'password', 'role'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
