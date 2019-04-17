<?php

namespace Modules\JobNews\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\FrontendUser;

class JobNews extends Model
{
//    use Translatable;

    protected $table = 'jobNews';
//    public $translatedAttributes = [];
    protected $fillable = ['title','benefit','salary','user_id','description','workingTime','startTime','endTime'];

    public function user () {
        return $this->hasOne(FrontendUser::class,'id', 'user_id');
    }
}
