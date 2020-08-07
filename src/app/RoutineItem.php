<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoutineItem extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function routine()
    {
        return $this->belongsTo('App\Routine');
    }
}
