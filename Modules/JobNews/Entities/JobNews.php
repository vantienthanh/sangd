<?php

namespace Modules\JobNews\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class JobNews extends Model
{
//    use Translatable;

    protected $table = 'jobNews';
//    public $translatedAttributes = [];
    protected $fillable = [];
}
