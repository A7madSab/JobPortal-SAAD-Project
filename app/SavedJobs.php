<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedJobs extends Model
{
    protected $fillable = [
        'user_id', 'vac_id',
    ];
}
