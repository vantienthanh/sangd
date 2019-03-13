<?php

namespace Modules\JobNews\Entities;

use Illuminate\Database\Eloquent\Model;

class JobNewsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'jobnews__jobnews_translations';
}
