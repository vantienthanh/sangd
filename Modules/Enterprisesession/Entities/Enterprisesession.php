<?php

namespace Modules\Enterprisesession\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Enterprisesession extends Model
{
    use Translatable;

    protected $table = 'enterprisesession__enterprisesessions';
    public $translatedAttributes = [];
    protected $fillable = [];
}
