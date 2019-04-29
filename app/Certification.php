<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    /**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id',
    ];
}
