<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     *
     * @var array
     */
    protected $fillable = [
        'place', 'degree', 'detail', 'grade', 'user_id',
    ];
}
