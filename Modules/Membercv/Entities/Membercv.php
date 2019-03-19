<?php

namespace Modules\Membercv\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Membercv extends Model
{
    use Translatable;

    protected $table = 'membercv__membercvs';
    public $translatedAttributes = [];
    protected $fillable = [];
}
