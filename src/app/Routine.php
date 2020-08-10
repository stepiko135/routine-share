<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Routine extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function routineItem()
    {
        return $this->hasMany('App\RoutinItem');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User','favorites','routine_id','user_id')->withTimestamps();
    }
}
