<?php

namespace Modules\Membersession\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Membersession extends Model
{
    use Translatable;

    protected $table = 'membersession__membersessions';
    public $translatedAttributes = [];
    protected $fillable = [];
}
