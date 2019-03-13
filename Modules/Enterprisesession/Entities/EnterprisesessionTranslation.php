<?php

namespace Modules\Enterprisesession\Entities;

use Illuminate\Database\Eloquent\Model;

class EnterprisesessionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'enterprisesession__enterprisesession_translations';
}
