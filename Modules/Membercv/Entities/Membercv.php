<?php

namespace Modules\Membercv\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Membercv extends Model
{
//    use Translatable;

    protected $table = 'memberCV';
//    public $translatedAttributes = [];
    protected $fillable = ['title','location','job','workingTime','description','user_id'];
}
